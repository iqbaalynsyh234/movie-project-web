<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from template.gentechtreedesign.com/html/streamlab/red-html/log-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 12:39:21 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Streamlab - Video Streaming HTML5 Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('movie/images/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('movie/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('movie/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('movie/css/responsive.css') }}" />>
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="{{ asset('movie/images/logo-1.png') }}" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <div class="gen-login-page-background"
            style="background-image: url('{{ asset('movie/images/background/asset-54.jpg') }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_login" action="{{ route('login') }}" method="POST">
                            @csrf
                            <p class="login-username">
                                <label for="user_login">Email Address</label>
                                <input type="text" name="email" id="user_login" class="input" size="20">
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" id="user_pass" class="input" size="20">
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="remember" type="checkbox" id="rememberme" value="forever"> Remember Me
                                </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" class="button button-primary" value="Log In">
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->
    <!-- JavaScript -->
    <script src="{{ asset('movie/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('movie/js/asyncloader.min.js') }}"></script>
    <script src="{{ asset('movie/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('movie/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('movie/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('movie/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('movie/js/popper.min.js') }}"></script>
    <script src="{{ asset('movie/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('movie/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('movie/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('movie/js/slick.min.js') }}"></script>
    <script src="{{ asset('movie/js/streamlab-core.js') }}"></script>
    <script src="{{ asset('movie/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: '{{ session('error') }}',
                confirmButtonText: 'Try Again'
            });
        @endif

        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === "F12" || 
                (e.ctrlKey && e.shiftKey && e.key === "I") || 
                (e.ctrlKey && e.key === "U")) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>