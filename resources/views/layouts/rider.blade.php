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

    

    

    @include('partials.rider.header')

    @yield('body')
    @include('partials.rider.footer')

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