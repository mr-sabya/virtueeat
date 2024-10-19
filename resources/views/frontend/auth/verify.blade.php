<x-app-layout>
    <!-- Verification Section -->
    <section class="verification_section">
        <div class="container">
            <div class="verification_outer_box">
                @if(isset($_GET['email']))
                <h3>Enter the 4-digit code sent to you at: <br>{{ $_GET['email'] }}</h3>
                @elseif(isset($_GET['phone']))
                <h3>Enter the 4-digit code sent to you at: <br>{{ $_GET['phone'] }}</h3>
                @endif
                <form class="verification_code" action="{{ route('login.verify.submit') }}" method="post">
                    @csrf

                    @if(isset($_GET['email']))
                    <input type="hidden" name="email" id="email" value="{{ $_GET['email'] }}">
                    @elseif(isset($_GET['phone']))
                    <input type="hidden" name="phone" id="phone" value="{{ $_GET['phone'] }}">
                    @endif

                    @if(isset($_GET['redirect']))
                    <input type="hidden" name="redirect" value="{{ $_GET['redirect'] }}">
                    @endif

                    <div class="form-group otp-field input">
                        <input type="text" pattern="\d" maxlength="1" minlength="1" placeholder="0" required name="otp1">
                        <input type="text" pattern="\d" maxlength="1" minlength="1" placeholder="0" required name="otp2">
                        <input type="text" pattern="\d" maxlength="1" minlength="1" placeholder="0" required name="otp3">
                        <input type="text" pattern="\d" maxlength="1" minlength="1" placeholder="0" required name="otp4">
                    </div>
                    <p>Tip: Make sure to check your inbox and spam folders</p>
                    <a href="#" class="resend_remainder">I didn't receive a code (0:04)</a>
                    <div class="form-group">
                        <a href="#" class="back_to_login"><i class="icon-arrow-left1"></i></a>
                        <button type="submit" class="theme-btn-two two">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Login Section End -->


    @section('scripts')
    <script>
        const inputs = document.querySelectorAll(".otp-field input");

        inputs.forEach((input, index) => {
            input.dataset.index = index;
            input.addEventListener("keyup", handleOtp);
            input.addEventListener("paste", handleOnPasteOtp);
        });

        function handleOtp(e) {
            /**
             * <input type="text" 👉 maxlength="1" />
             * 👉 NOTE: On mobile devices `maxlength` property isn't supported,
             * So we to write our own logic to make it work. 🙂
             */
            const input = e.target;
            let value = input.value;
            let isValidInput = value.match(/[0-9a-z]/gi);
            input.value = "";
            input.value = isValidInput ? value[0] : "";

            let fieldIndex = input.dataset.index;
            if (fieldIndex < inputs.length - 1 && isValidInput) {
                input.nextElementSibling.focus();
            }

            if (e.key === "Backspace" && fieldIndex > 0) {
                input.previousElementSibling.focus();
            }

            if (fieldIndex == inputs.length - 1 && isValidInput) {
                submit();
            }
        }

        function handleOnPasteOtp(e) {
            const data = e.clipboardData.getData("text");
            const value = data.split("");
            if (value.length === inputs.length) {
                inputs.forEach((input, index) => (input.value = value[index]));
                submit();
            }
        }

        function submit() {
            console.log("Submitting...");
            // 👇 Entered OTP
            let otp = "";
            inputs.forEach((input) => {
                otp += input.value;
                // input.disabled = true;
                // input.classList.add("disabled");
            });
            console.log(otp);
            // 👉 Call API below
        }
    </script>
    @endsection

</x-app-layout>