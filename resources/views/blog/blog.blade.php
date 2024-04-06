@extends('layout.blog_app')
@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background-image: url(assets/img/blog_bg.jpg); background-size: cover; background-repeat: no-repeat">

  <div class="container">
    <div class="row"> 
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
       
          <h2 style="width: 30rem">Welcome 
            @if(Auth::user())
            {{ Auth::user()->name }}
            @endif 
            To VoltaBlog.
          </h2>
           <h2> There are {{ $posts_sum }} Posts
            @if(Auth::user())
              @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'writer' || Auth::user()->user_role == 'colab')          
              and You have {{ $myPost_sum }} Posts
              @endif
            @endif
          </h2>
          @if(Auth::user())
            @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'writer' || Auth::user()->user_role == 'colab')
              <div class="col-12">
                  <a href="./blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                  <a href="./my_posts" class="btn btn-primary btn-sm">My Posts</a>
              </div>
            @endif  
          @endif 
      </div>
      {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="200px" src="assets/img/blog_.png" class="img-fluid animated" alt=""> 
      </div> --}}
    </div>
    
  </div>

</section><!-- End Hero -->



<section id="category-dropdown" class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <select id="category-select" class="form-control">
          <option value="">All Categories</option>
          <option value="fashion" selected>Fashion</option>
          <option value="vehicles" selected>Vehicles</option>
          <option value="solar_inverter" selected>Solar and Inverters</option>
          <option value="smart_gadgets" selected>Smart Gadgets</option>
          <option value="socials" selected>Socials</option>
        </select>
      </div>
    </div>
  </div>
</section>

<section id="store-posts" class="py-5">
  <div class="container">
    <div class="row" id="filtered-posts">
      @foreach($posts as $post)
        @if (($post->type != "Portfolio") && ($post->type != "wall_video") && ($post->type != "advert") && ($post->type != "executives"))
          <div class="col-lg-3 post" data-category="{{ $post->category }}">
            <div class="card mb-4">
              @if(!empty(trim($post->image)))
                <img style="width: auto; height: 150px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="blog_imag">
              @endif
              <div class="card-body">
                <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body ?? '',100,' ...') !!}</p>
                <a class="btn btn-primary" href="/blog/{{ $post->id }}">Read more →</a> 
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>


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
            <strong>Email:</strong> voltafrik2023@gmail.com<br>
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

@endsection