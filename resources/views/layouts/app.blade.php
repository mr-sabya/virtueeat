<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Virtue Eat') }}</title>

    <!-- Favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ '/assets/frontend/images/favicons/apple-touch-icon.png' }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ '/assets/frontend/images/favicons/favicon-32x32.png' }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ '/assets/frontend/images/favicons/favicon-16x16.png' }}" />
    <link rel="manifest" href="{{ '/assets/frontend/images/favicons/site.webmanifest' }}" />
    <meta name="description" content="Virtue Food HTML 5 Template" />
    <meta name="developer" content="A M Asif Imtiaz Udoy" />

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    @livewireStyles


    <link rel="stylesheet" href="{{ '/assets/frontend/css/bootstrap.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/bootstrap-select.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/fontawesome/css/all.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/icomoon.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/jquery.magnific-popup.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/animate.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/custom-animate.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/jquery-ui.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/nice-select.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/owl.carousel.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/timePicker.css' }}" />
    <!-- template styles -->

    <link rel="stylesheet" href="{{ '/assets/frontend/css/style.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/custom.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/frontend/css/responsive.css' }}" />

    <style>
        .suggestions {
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            position: absolute;
            z-index: 1000;
            background: white;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
    </style>

</head>

<body>

    @if(Route::is('home'))
    <!-- Start Preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="v" class="letters-loading">
                            v
                        </span>
                        <span data-text-preloader="i" class="letters-loading">
                            i
                        </span>
                        <span data-text-preloader="r" class="letters-loading">
                            r
                        </span>
                        <span data-text-preloader="t" class="letters-loading">
                            t
                        </span>
                        <span data-text-preloader="u" class="letters-loading">
                            u
                        </span>
                        <span data-text-preloader="e" class="letters-loading">
                            e
                        </span>
                        <span data-text-preloader="f" class="letters-loading">
                            f
                        </span>
                        <span data-text-preloader="o" class="letters-loading">
                            o
                        </span>
                        <span data-text-preloader="o" class="letters-loading">
                            o
                        </span>
                        <span data-text-preloader="d" class="letters-loading">
                            d
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->
    @endif
    <!-- Page Content -->
    <main>
        <div class="page-wrapper">

            <!--Start Main Header One-->
            @include('partials.frontend.header')

            <!--End Main Header One-->

            {{ $slot }}

            <!--Start footer area -->
            @include('partials.frontend.footer')
            <!--End footer area-->

        </div>


        <div class="mobile-nav__wrapper">
            <div class="mobile-nav__overlay mobile-nav__toggler"></div>
            <div class="mobile-nav__content">
                <span class="mobile-nav__close mobile-nav__toggler">
                    <i class="icon-plus"></i>
                </span>
                <div class="logo-box">
                    <a href="index.html" aria-label="logo image">
                        <img src="assets/images/mobile-menu-logo.png" alt="" />
                    </a>
                </div>
                <div class="main-header-one__bottom-right">
                    <div class="main-header-one__bottom-right-language">
                        <a class="theme-btn-one" href="#">En</a>
                    </div>
                    <div class="main-header-one__bottom-right-btn">
                        <a class="theme-btn-one" href="#">Login / Sign up</a>
                    </div>
                </div>
                <div class="mobile-nav__container"></div>
                <ul class="mobile-nav__contact list-unstyled">
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:info@example.com">info@example.com</a>
                    </li>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:123456789">444 000 777 66</a>
                    </li>
                </ul>
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>

            </div>
        </div>

        @isset($extra)
        {{ $extra }}
        @endisset
    </main>
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <i class="icon-arrow-left1"></i>
    </a>
    <script data-navigate-once src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/isotope.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/jquery.appear.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/jquery.validate.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/timePicker.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/amount-selector.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/delivery_selector.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/price_selector.js') }}"></script>
    
    <script data-navigate-once src="{{ asset('assets/frontend/js/rating-selector.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/search_schedule.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/sidebar_map.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/dropdown_menu.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/frontend/js/wow.js') }}"></script>
    @livewireScripts

    <!-- Template js -->
    <script data-navigate-once src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    @yield('scripts')
    <script>
        function initializeOwlCarousel() {

            console.log('Initializing Owl Carousel...');
            $('.owl-carousel').owlCarousel({
                "loop": false,
                "autoplay": true,
                "margin": 26.67,
                "nav": true,
                "dots": false,
                "smartSpeed": 500,
                "autoplayTimeout": 10000,
                "navText": ["<i class=\"icon-arrow-left\"></i>", "<i class=\"icon-arrow-right\"></i>"],
                "responsive": {
                    "0": {
                        "items": 1
                    },
                    "768": {
                        "items": 2
                    },
                    "992": {
                        "items": 3
                    },
                    "1200": {
                        "items": 4
                    }
                }
            });


        }

        function destroyOwlCarousel() {

            var $owl = $('.owl-carousel');
            if ($owl.hasClass('owl-loaded')) {
                console.log('Destroying Owl Carousel...');
                $owl.trigger('destroy.owl.carousel').removeClass('owl-hidden').removeClass('owl-loaded');
                $owl.find('.owl-stage-outer').children().unwrap(); // Remove the owl wrapper
            } else {
                console.log('No Owl Carousel instance to destroy.');
            }
        }

        document.addEventListener('livewire:navigated', function() {
            initializeOwlCarousel();

            Livewire.on('slickInitialized', () => {
                destroyOwlCarousel();
                // initializeOwlCarousel();
                setTimeout(initializeOwlCarousel, 200);
            });
        });
    </script>


</body>

</html>