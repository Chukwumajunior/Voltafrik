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

    @media screen and (max-width: 576px) {
        .container-post {
            width: 50%;
        }
    }
    @media screen and (max-width: 576px) {
        .body-text p{
            display: none; /* Hide body text for smaller devices */
        }
        .body-text img{
            width: 100%;
            height: 100px;
        }
    }
    #store-posts .card {
      transition: transform 0.3s;
    }

    #store-posts .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
</style>
  
</head>

<body>

  <header id="header" class="fixed-top bg-secondary">
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
                  <li><a href="consultancy">Consultancy</a></li>
                  <li><a href="smart-energy">Smart Energy</a></li>
                  <li><a href="smart-house">Smart House</a></li>
                  <li><a href="website">Website & Blog</a></li>
                  <li><a href="data-analysis">Data Analysis</a></li>
                  <li><a href="stores">Stores</a></li>
                </ul>
              </li>
              <li><a href="./blog">Blog</a></li>
              <li><a href="terms">Terms and conditions</a></li>
              <li><a href="privacy">Privacy Policy</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-link scrollto" href="#about">All_Blog</a></li> --}}
          <li><a class="nav-link scrollto" href="portfolio">Portfolio</a></li>
          @if(Auth::user())
            <li><a class="nav-link" href="profile">Profile</a></li>
          @endif
          @if(!Auth::user())
            <li><a class="getstarted" href="/login">Login</a></li>
          @endif
          @if(Auth::user())
          <li><a href="{{ url('/logout') }}"> logout </a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
  
    </div>
  </header><!-- End Header -->
  

   <!-- ======= Header ======= -->

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
          <h3>Voltafrik</h3>
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

        <div class="col-lg-3 col-md-6 footer-links text-center">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const categorySelect = document.getElementById('categorySelect');
    const postTitles = document.querySelectorAll('.post-title');

    searchInput.addEventListener('input', function() {
      const searchText = searchInput.value.trim().toLowerCase();
      const selectedCategory = categorySelect.value;

      postTitles.forEach(title => {
        const postCategory = title.parentElement.parentElement.querySelector('p').textContent.trim().toLowerCase();
        const titleText = title.textContent.trim().toLowerCase();

        // Check if the title and category match the search input and selected category
        const isCategoryMatch = selectedCategory === 'all' || postCategory === selectedCategory;
        const isTitleMatch = titleText.includes(searchText);

        // Show or hide the post title based on matching criteria
        title.style.display = isCategoryMatch && isTitleMatch ? 'block' : 'none';
      });
    });

    // Attach click event listener to each post title to navigate to the respective post
    postTitles.forEach(title => {
      title.addEventListener('click', function() {
        const postId = title.dataset.postId;
        window.location.href = "/blog/" + postId;
      });
    });
  });
</script>

<script>
  // Wait for the DOM to be fully loaded
  $(document).ready(function() {
    // Filter posts by category
    $('#category-select').change(function() {
      var category = $(this).val();
      if (category === '') {
        $('.post').show();
      } else {
        $('.post').hide();
        $('.post[data-category="' + category + '"]').show();
      }
    });
  });
</script>


</body>

</html>