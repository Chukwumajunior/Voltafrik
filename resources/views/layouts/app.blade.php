<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">

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
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
        <script>
            window.watsonAssistantChatOptions = {
              integrationID: "3d583b9f-6ef4-4ef3-8c58-661d6410d126", // The ID of this integration.
              region: "eu-gb", // The region your integration is hosted in.
              serviceInstanceID: "ca6fc8ae-b9c5-421b-9fe1-b3231485a0e3", // The ID of your service instance.
              onLoad: async (instance) => { await instance.render(); }
            };
            setTimeout(function(){
              const t=document.createElement('script');
              t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
              document.head.appendChild(t);
            });
          </script>

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
                  <li><a class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>
                  <li><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                  <li class="dropdown">
                      <a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a href="{{ route('consultancy') }}">Consultancy</a></li>
                          <li><a href="{{ route('smart-energy') }}">Smart Energy</a></li>
                          <li><a href="{{ route('smart-house') }}">Smart House/Gadgets</a></li>
                          <li><a href="{{ route('website') }}">Website & Blog</a></li>
                          <li><a href="{{ route('data-analysis') }}">Data Analysis</a></li>
                          <li><a href="{{ route('stores') }}">Stores</a></li>
                          <li><a href="{{ route('blog.index') }}">Blog</a></li>
                          <li class="dropdown">
                              <a href="#"><span>Others</span> <i class="bi bi-chevron-right"></i></a>
                              <ul>
                                  @if (Auth::check())
                                      @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'colab' || Auth::user()->user_role == 'writer')
                                          <li class="nav-item">
                                              <a href="{{ route('createPost') }}">Create New Post</a>
                                          </li>
                                      @endif
                                  @endif
                                  <li><a href="{{ route('terms') }}">Terms and conditions</a></li>
                                  <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                  <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                              </ul>
                          </li>
                      </ul>
                  </li>
          
                  @if(Auth::check())
                      <li><a class="nav-link" href="{{ route('profile.edit') }}">Profile</a></li>
                  @endif
                  @if(!Auth::check())
                      <li><a class="getstarted" href="{{ route('login') }}">Login</a></li>
                  @endif
                  @if(Auth::check())
                      <li><a href="{{ route('logout') }}"> logout </a></li>
                  @endif
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          
      
          </div>
        </header><!-- End Header -->
         <!-- ======= Hero Section ======= -->
         <section id="hero" class="d-flex align-items-center" style="height: 400px; background-color: grey">
            <div class="container">     
                <div class="cjustify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Welcome to Your Profile</h1>
                    <h2>Effect changes to your profile</h2>
                </div>
                <div>         
                    @if (Auth::user()->user_role == 'admin')
                                        <a class="button" href="/profile/admin" style="text-align: center">You are an Admin. Continue to Portal</a>
                    @endif
                    @if (Auth::user()->user_role == 'writer')
                        <a class="button" href="/profile/admin/writer" style="text-align: center">You are a writer. Go to Blog Manager</a>
                    @endif
                    @if (Auth::user()->user_role == 'colab')
                        <a class="button" href="/stores" style="text-align: center">You are a Colaborator. Manage your Store</a>
                    @endif
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

          <div class="footer-top">
            <div class="container">
              <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>VoltAfrik</h3>
                    <p>
                    Yaba, Lagos<br>
                    Nigeira <br>
                    <strong>Phone:</strong> +2349034152070<br>
                    <strong>Phone:</strong> +2349046282789<br>
                    <strong>Email:</strong> voltademy@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Useful Links1</h4>
                  <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('stores') }}">Stores</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('contact') }}">Contact</a></li>
                  </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Useful Links2</h4>
                  <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('privacy') }}">Privacy policy</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('terms') }}">T & C</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('consultancy') }}">Consultancy</a></li>
                  </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Our Services</h4>
                  <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('smart-house') }}">Smart Gadgets</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('smart-energy') }}">Smart Energy</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('website') }}">Web Development</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="{{ route('data-analysis') }}">Data Analysis</a></li>
                  </ul>
                </div>
              

                <div class="col-lg-3 col-md-6 footer-links text-center">
                  <h4>Our Social Networks</h4>
                  <p>Bellow are our social media handles</p>
                  <div class="social-links mt-3">
                    <a href="https://twitter.com/ChukwumaOhadoma" target="blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="https://web.facebook.com/people/Voltafrik/61557974579735/" target="blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="https://www.instagram.com/voltafrik/" target="blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/chukwuma-innocent-91aaaa284/" target="blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    <a href="https://www.youtube.com/@Voltafrik" target="_blank" class="youtube"><i class="bx bxl-youtube"></i></a>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright 2023 @<strong><span>Voltafrik</span></strong>. All Rights Reserved
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
       
    </body>
</html>
