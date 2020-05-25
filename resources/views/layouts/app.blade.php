<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="front/img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <script src="{{ asset('front/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @yield('styles')

    <title>{{'Online Shop' }}</title>

   

</head>
<body>

    <div id="app">
        @include('layouts.topnotification')
        @include('layouts.nav')    
        @include('layouts.sidenav')       
        @include('layouts.slider')       
        @include('layouts.popular')       
        <main class="py-4">
            @yield('content')
        </main>        
        @include('layouts.brand') 
        @include('layouts.newsletter') 

        @include('layouts.footer') 
        @include('layouts.quickview') 

    </div>

<script src="{{ asset('front/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script src="{{ asset('front/js/popper.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('front/js/waypoints.min.js') }}"></script>
<script src="{{ asset('front/js/ajax-mail.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/plugins.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
  @yield('scripts')
</body>
</html>
