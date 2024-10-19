<x-app-layout>
    <!-- Login Section -->
    <section class="login_section">
        <div class="container">
            <div class="login_outer_box">
                <h3>What's your phone number <br> or email address?</h3>
                <div class="login-container">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf

                        @if(isset($_GET['redirect']))
                        <input type="hidden" name="redirect" value="{{ $_GET['redirect'] }}">
                        @endif
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Enter your email address" required>
                            <input type="text" name="phone" id="phone" placeholder="Enter your phone number" style="display: none;">
                        </div>
                        <!-- <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                        </div> -->
                        <div class="form-group">
                            <button type="submit" class="theme-btn-two">Continue </button>
                        </div>
                    </form>
                    <span>or</span>
                    <div class="others_links">
                        <a href="#">
                            <div class="icon_box"><img src="{{ url('assets/frontend/images/google_icon.svg') }}" alt=""></div> Continue with Google
                        </a>
                        <a href="#">
                            <div class="icon_box"><img src="{{ url('assets/frontend/images/mac_icon.png') }}" alt=""></div> Continue with Apple
                        </a>
                        <a href="#">
                            <div class="icon_box"><img src="{{ url('assets/frontend/images/facebook_icon.png') }}" alt=""></div> Continue with Facebook
                        </a>
                        <a href="javascript:void(0)" id="show_phone">
                            <div class="icon_box"><img src="{{ url('assets/frontend/images/phone_icon.png') }}" alt=""></div> Continue with Phone number
                        </a>
                        <a href="javascript:void(0)" id="show_email" style="display: none;">
                            <div class="icon_box"><img src="{{ url('assets/frontend/images/email_icon.png') }}" alt=""></div> Continue with Email Address
                        </a>
                    </div>
                </div>
                <p>By proceeding, you consent to get calls, WhatsApp or SMS messages, including by automated means, from Virtue eat and its affiliates to the number provided.</p>
                <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a> apply.</p>
            </div>
        </div>
    </section>
    <!-- Login Section End -->


    @section('scripts')
    <script>
        $('#show_phone').click(function(){
            $('#email').attr('required', false);
            $('#email').hide();
            $('#phone').attr('required', true);
            $('#phone').show();
            
            $(this).hide();
            $('#show_email').show();
        })

        $('#show_email').click(function(){
            $('#phone').attr('required', false);
            $('#phone').hide();
            $('#email').attr('required', true);
            $('#email').show();
            
            $(this).hide();
            $('#show_phone').show();
        })
    </script>
    @endsection
</x-app-layout>