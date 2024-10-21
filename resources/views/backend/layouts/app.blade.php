<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - virtue eats</title>

    <!-- Add Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Add Style Sheet -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/flaticon_admin.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('assets/backend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/shop2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/responsive.css') }}">
</head>

<body class="boxed_wrapper">
    @include('flash::message')

    <div class="admin-page">
        <!-- header start -->
        @include('partials.backend.sidebar')
        
        <!-- header end -->
        <div id="adminContent">
            <!-- sidebar start -->
            @include('partials.backend.header')
            <!-- sidebar end -->

            <div class="work_shift_outer_box p_10">
                @yield('content')
            </div>
        </div>
    </div>



    <!-- Jequery Plugins -->
    <script src="{{ asset('assets/backend/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('assets/backend/js/wow.js') }}"></script>

    
    <script src="{{ asset('assets/backend/js/chart.js') }}"></script>
    <script src="{{ asset('assets/backend/js/earnings_chart.js') }}"></script>
  
    <script src="{{ asset('assets/backend/js/sidebar-menu.js')}}"></script>
    
    <script src="{{ asset('assets/backend/js/notification.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>


    <script src="{{ asset('assets/backend/js/main.js') }}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    @stack('scripts')

    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
</body>

</html>