<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Streamlab - Video Streaming')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="shortcut icon" href="{{ asset('movie/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('movie/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('movie/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('movie/css/responsive.css') }}">
</head>

<body>
    <!-- Loader -->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="{{ asset('movie/images/logo-1.png') }}" alt="loading">
        </div>
    </div>

    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')
    </div>
    <!-- Footer -->
    @include('partials.footer')
    <!-- JavaScript -->
    <!-- js-min -->
    <script src="{{ asset('movie/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('movie/js/asyncloader.min.js') }}"></script>
    <!-- JS bootstrap -->
    <script src="{{ asset('movie/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel -->
    <script src="{{ asset('movie/js/owl.carousel.min.js') }}"></script>
    <!-- counter-js -->
    <script src="{{ asset('movie/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('movie/js/jquery.counterup.min.js') }}"></script>

    <!-- popper-js -->
    <script src="{{ asset('movie/js/popper.min.js') }}"></script>
    <script src="{{ asset('movie/js/swiper-bundle.min.js') }}"></script>

    <!-- Iscotop -->
    <script src="{{ asset('movie/js/isotope.pkgd.min.js') }}"></script>

    <script src="{{ asset('movie/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('movie/js/slick.min.js') }}"></script>

    <script src="{{ asset('movie/js/streamlab-core.js') }}"></script>

    <script src="{{ asset('movie/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>

</html>