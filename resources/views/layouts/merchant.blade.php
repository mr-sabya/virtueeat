<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Virtue eats | Merchant Register</title>

    <!-- Stylesheets -->
    <link href="{{ asset('assets/merchant/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/elpath.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/merchant/phone/css/intlTelInput.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('assets/merchant/css/elements-css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/elements-css/banner.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/elements-css/language.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/elements-css/login-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/elements-css/login-box.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/elements-css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/update.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/merchant/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.7/build/css/intlTelInput.css">


    <!-- End Stylesheets -->

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('images/merchant/icons/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/merchant/icons/favicon.png') }}" type="image/x-icon">
    <!-- End Fav Icon -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- End Fonts -->

</head>

<!-- page wrapper -->

<body class="boxed_wrapper">

    <!--Login Popup-->
    <div id="login-popup" class="login-popup">
        <div class="popup-inner">
            <div class="close-login pull-right"><i class="fa-solid fa-xmark"></i></div>
            <div class="overlay-layer"></div>
            <div class="login-container">
                <div class="login_box">
                    <h6 class="sub_title">login</h6>
                    <ul class="social_links">
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/in.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/google.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/facebook-1.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/twitter-1.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/mac.png') }}" alt=""></a></li>
                    </ul>
                    <form action="{{ route('merchant.login') }}" id="login-form" method="POST" class="clearfix">
                        @csrf
                        <div class="form-group">
                            <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <div class="icon"><i class="fa-solid fa-lock"></i></div>
                            <input type="password" class="form-control" id="email" placeholder="Enter password" name="password">
                        </div>
                        <a href="#" class="link">Forgot Password?</a>
                        <button type="submit" id="button">Submit</button>
                        <div class="create_account">Not Registered yet?<a href="#" class="link"> Create an
                                Account</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Login Popup-->

    <!--Sign Up Popup-->
    <div id="signup-popup" class="signup-popup">
        <div class="popup-inner">
            <div class="close-signup pull-right"><i class="fa-solid fa-xmark"></i></div>
            <div class="overlay-layer"></div>
            <div class="login-container">
                <div class="login_box">
                    <h6 class="sub_title">Sign Up</h6>
                    <ul class="social_links">
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/in.png') }}" alt=""></a>
                        </li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/google.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/facebook-1.png') }}" alt=""></a>
                        </li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/twitter-1.png') }}" alt=""></a>
                        </li>
                        <li><a href="#"><img src="{{ asset('assets/merchant/images/resource/mac.png') }}" alt=""></a>
                        </li>
                    </ul>
                    <form action="{{ route('register') }}" id="creating-account-form" class="defult-form style-two clearfix" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                <div class="icon"><img src="{{ asset('assets/images/resource/icon-mail.png') }}" alt="">
                                </div>
                                <input type="email" class="form-control pl" placeholder="Enter email" name="email">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                <div class="icon"><img src="{{ asset('assets/images/resource/icon-lock.png') }}" alt="">
                                </div>
                                <div id="show_hide_password_1">
                                    <input class="form-control pl" type="password" placeholder="Password" name="password">
                                    <div class="input-group-addon"><i class="eyeicon fa fa-eye-slash" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                <div class="icon"><img src="assets/images/resource/icon-lock.png" alt="">
                                </div>
                                <div id="show_hide_password_2">
                                    <input class="form-control pl" type="password" placeholder="Confirm Password" name="password_confirmation">
                                    <div class="input-group-addon"><i class="eyeicon fa fa-eye-slash" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                <input type="text" class="form-control" placeholder="Location" name="location">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group style-two">
                                <select name="phoneCode" required>
                                    <option selected hidden value="">Code</option>
                                    <option value="66">+98</option>
                                    <option value="66">+99</option>
                                    <option value="66">+90</option>
                                    <option value="66">+66</option>
                                </select>
                                <input type="phone" class="form-control" name="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                <input type="text" class="form-control" placeholder="Invitation Code (Optional)" name="invitation">
                            </div>
                            <input type="hidden" name="userType" value="2">
                            <input type="hidden" name="country_id">
                            <input type="hidden" name="city_id">
                            <input type="hidden" name="vehicle_type">
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group style-two">
                                <input id="terms" type="checkbox" name="terms" value="terms" required />
                                <label for="terms">I have read an agreed to the terms and conditions.</label>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 form-group style-two">
                                <button type="submit">Submit</button>
                                <strong>Already have an account?</strong>
                                <a href="#" class="sign_in login-box-outer login-toggler">Sign in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Sign Up Popup-->

    @include('partials.frontend.merchantHeader')

    @yield('body')
    @include('partials.frontend.merchantFooter')

    <!-- Scroll to Top -->
    <div class="scroll-top scroll-to-target" data-target="html">
        <i class="flaticon-next"></i>
    </div>
    <!--End Scroll to Top -->

    <!-- Jequery Plugins -->
    <script src="{{ asset('assets/merchant/js/bootstrap.js') }}"></script>
    {{-- <script src="{{ asset('assets/merchant/phone/js/intlTelInput.min.js') }}"></script> --}}

    <script src="{{ asset('assets/merchant/js/jquery.js') }}"></script>
    {{-- <script src="{{ asset('assets/merchant/phone/js/intlTelInput-jquery.min.js') }}"></script> --}}


    <script src="{{ asset('assets/merchant/js/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/appear.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/owl.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/wow.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/validation.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/recaptcha-api.js') }}"></script>
    <script src="{{ asset('assets/merchant/js/bxslider.js') }}"></script>
    <!-- End Jequery Plugins -->

    <!-- Main Js -->
    <script src="{{ asset('assets/merchant/js/main.js') }}"></script>
    <!-- End Main Js -->


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('scripts')
</body>
<!-- End Page Wrapper -->

</html>