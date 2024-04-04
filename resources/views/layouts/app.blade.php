<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        {{-- <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">

         <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">
        
            <h1 class="logo me-auto"><a href="#hero">Voltafrik</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        
            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li class="dropdown"><a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                        <li><a href="consult">Consultancy</a></li>
                        <li><a href="smart-energy">Smart Energy</a></li>
                        <li><a href="smart-house">Smart House</a></li>
                        <li><a href="website">Website & Blog</a></li>
                        <li><a href="data-analysis">Data Analysis</a></li>
                        <li><a href="stores">Stores</a></li>
                        </ul>
                    </li>
                    <li><a href="blog">Blog</a></li>
                    <li><a href="terms">Terms and conditions</a></li>
                    <li><a href="privacy">Privacy Policy</a></li>
                    </ul>
                </li>
                @if(Auth::user())
                    <li><a class="nav-link" href="profile">Profile</a></li>
                @endif
                @if(!Auth::user())
                    <li><a class="getstarted" href="/login">Create account</a></li>
                @endif
                @if(Auth::user())
                <li><a href="{{ url('/logout') }}"> logout </a></li>
                @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        
            </div>
        </header><!-- End Header -->
         <!-- ======= Hero Section ======= -->
         <section id="hero" class="d-flex align-items-center" style="height: 400px; background-color: grey">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <h1>Welcome to Your Profile</h1>
                        <h2>Effect changes to your profile</h2>
                        @if (Auth::user()->user_role == 'admin')
                            <a class="button" href="/profile/admin" style="text-align: center">You are an admin. Click to continue to the admin portal</a>
                        @endif
                        @if (Auth::user()->user_role == 'writer')
                            <a class="button" href="/profile/writer" style="text-align: center">You are a writer. Click to continue to the post management portal</a>
                        @endif
                        @if (Auth::user()->user_role == 'colab')
                        <a class="button" href="/stores" style="text-align: center">You are a Colaborator. click to visit the store</a>
                        @endif
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img width="300px" src="assets/img/inter1.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section><!-- End Hero -->
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
        </div>

          <!-- ======= Footer ======= -->
        <footer id="footer">

            {{-- <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>You may subscribe to our Newsletters for updtes on our products and services</p>
                    <form action="" method="post">
                    <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
                </div>
            </div>
            </div> --}}

            <div class="footer-top">
            <div class="container">
                <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>VoltAfrik</h3>
                    <p>
                    Yaba, Lagos<br>
                    Nigeira <br><br>
                    <strong>Phone:</strong> +2349034152070<br>
                    <strong>Phone:</strong> +2349046282789<br><br>
                    <strong>Email:</strong> voltademy@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/consultancy">About us</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="/blog">Blog</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="terms">Terms of service</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="privacy">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="smart-house">Smart House/Energy</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="smart-energy">Smart Energy</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="website">Web Development</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="consultancy">Consultancy</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="data-analysis">Data Analysis</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="stores">Stores</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Bellow are our social media handles</p>
                    <div class="social-links mt-3">
                        <a href="https://twitter.com/ChukwumaOhadoma" class="twitter"><i class="bx bxl-twitter" target="_blank"></i></a>
                        <a href="https://web.facebook.com/people/Voltafrik/61557974579735/" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/voltafrik/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/chukwuma-innocent-91aaaa284/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

                </div>
            </div>
            </div>

            <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright 2023 @<strong><span>VoltAfrik</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Designed by <a href="https://voltafrik.com.ng/">Ohadoma Chukwuma</a>
            </div>
            </div>
        </footer><!-- End Footer -->

        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        {{-- <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script> --}}
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </body>
</html>