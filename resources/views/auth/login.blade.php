<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<x-app-layout>

    <!-- Login Section -->
    {{-- <section class="login_section">
        <div class="container">
            <div class="login_outer_box">
                <h3>What's your phone number <br> or email address?</h3>
                <div class="login-container">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="email" placeholder="Enter your phone number or email address" required>
                        </div>
                        <div class="form-group">
                            <button type="button" class="theme-btn-two">Continue </button>
                        </div>
                    </form>
                    <span>or</span>
                    <div class="others_links">
                        <a href="#">
                            <div class="icon_box"><img src="{{ 'assets/frontend/images/google_icon.svg' }}"
                                    alt=""></div>
                            Continue
                            with Google
                        </a>
                        <a href="#">
                            <div class="icon_box"><img src="{{ 'assets/frontend/images/mac_icon.png' }}" alt="">
                            </div> Continue
                            with
                            Apple
                        </a>
                        <a href="#">
                            <div class="icon_box"><img src="{{ 'assets/frontend/images/facebook_icon.png' }}"
                                    alt=""></div>
                            Continue
                            with Facebook
                        </a>
                        <a href="#">
                            <div class="icon_box"><img src="{{ 'assets/frontend/images/phone_icon.png' }}"
                                    alt=""></div> Continue
                            with Phone number
                        </a>
                    </div>
                </div>
                <p>By proceeding, you consent to get calls, WhatsApp or SMS messages, including by automated means, from
                    Virtue eat and its affiliates to the number provided.</p>
                <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a
                        href="#">Terms of Service</a> apply.</p>
            </div>
        </div>
    </section> --}}

</x-app-layout>
