<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }}</title>
  <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
   <!-- Scripts -->
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

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .p {
        font-family: 'Nunito';
        font-size: 16px;
    }
</style>
  
</head>

<body>

 @yield('content')

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
            <li><i class="bx bx-chevron-right"></i> <a href="terms">Terms and Conditions</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="privacy">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="smart_energy">Smart Energy</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="smart_house">Smart House</a></li>
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
            <a href="https://twitter.com/ChukwumaOhadoma" target="blank" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://web.facebook.com/people/Voltafrik/61557974579735/" target="blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/voltafrik/" target="blank" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="https://www.linkedin.com/in/chukwuma-innocent-91aaaa284/" target="blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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


 {{-- <div id="preloader"></div> --}}
 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all posts
        const posts = document.querySelectorAll('.post');
        let currentPostIndex = 0;

        // Function to show next post
        function showNextPost() {
            // Hide all posts
            posts.forEach(post => {
                post.style.display = 'none';
            });

            // Show the next post
            posts[currentPostIndex].style.display = 'block';

            // Increment currentPostIndex or reset to 0 if it reaches the end
            currentPostIndex = (currentPostIndex + 1) % posts.length;
        }

        // Show the first post immediately
        showNextPost();

        // Set interval to show next post every 5 minutes
        setInterval(showNextPost, 1 * 15 * 1000); // 5 minutes in milliseconds
    });
</script>



  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>