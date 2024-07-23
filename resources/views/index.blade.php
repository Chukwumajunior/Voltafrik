@extends('layout.whole')
 @section('content')

 <header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="#hero">Voltafrik</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          {{-- <li><a class="nav-link scrollto" href="#skills">Distribution</a></li> --}}
          {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
          <li><a class="nav-link scrollto" href="contact">Contact</a></li>
          {{-- <li><a class="nav-link scrollto" href="#portfolio">Advert</a></li> --}}
          <li class="dropdown scrollto">
              <a href="#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
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
                          @if (Auth::user())
                              @if((Auth::user()->user_role == 'admin') || (Auth::user()->user_role == 'colab') || (Auth::user()->user_role == 'writer'))
                                  <li class="nav-item">
                                      <a href="{{ route('createPost') }}">Create New Post</a>
                                  </li>
                              @endif
                          @endif
                          <li><a href="{{ route('terms') }}">Terms and conditions</a></li>
                          <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                          {{-- <li><a class="nav-link scrollto" href="#about">All_Blog</a></li> --}}
                          <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                      </ul>
                  </li>
              </ul>
          </li>
          @if(Auth::user())
              <li><a class="nav-link" href="{{ route('profile.edit') }}">Profile</a></li>
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
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero-section d-flex align-items-center text-white" style="background-image: url(assets/img/bg006.png); background-size: cover; background-repeat: no-repeat;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        @if(Auth::user())
          <h3>Welcome, {{ Auth::user()->name }}!</h3>
        @else
        <h3>Welcome To Voltafrik</h3>
        @endif
        <h5>We've Got the Best Solution For Your Business and Home</h5>
        <p>At our core, we're a team of visionary engineers, dedicated to leveraging cutting-edge technology to revolutionize your experience.</p>
        <div class="d-flex justify-content-center justify-content-lg-start">
          @if(!Auth::user())
            <a href="/consultancy" class="btn btn-get-started">Get Started</a>
          @endif
          @foreach ($posts as $post)
            @if($post->type == "Wall video")
              <a href="{{ strip_tags($post->body) }}" class="glightbox btn btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            @endif
          @endforeach
        </div>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        @if (Session::has('success_message'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('success_message') }}
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

<main id="main">
  {{-- <section class="clients section-bg position-relative overflow-hidden" style="height: 200px;">
    <video autoplay muted loop id="bg-video" class="w-100 h-100 object-fit-cover">
        <source src="{{ asset('assets/vid/video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container position-relative" style="z-index: 1;">
        <div class="content-overlay text-center text-white" style="position: absolute; bottom: 20%; left: 50%; transform: translate(-50%, -50%);">
            <h2>Welcome to the future</h2>
        </div>
    </div>
  </section> --}}

  <section id="about" class="about bg-light py-4">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>About Us</h2>  
      </div>
      <div class="row">
        @foreach ($posts as $post)
          @if($post->type == "Wall image1")
            <div class="col-md-6 mb-4">
              @if(!empty(trim($post->image)))
                <img src="{{ asset("uploads/". $post->image) }}" class="img-fluid w-100" alt="Product Image" style="height: auto; object-fit: cover;">
              @endif
            </div>
            <div class="col-md-6 mb-4">
              <h4 class="professional-post-title">{{ $post->title }}</h4>
              <p class="professional-post-body">{!! $post->body !!}</p>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="container" data-aos="fade-up">
      <div id="postContainer" class="row">
        @foreach ($posts as $post)
          @if($post->type == "Wall image2")
            <div class="post col-md-12 mb-4">
              <div class="row">
                <div class="col-md-6 mb-4">
                  @if(!empty(trim($post->image)))
                    <img src="{{ asset("uploads/". $post->image) }}" class="img-fluid w-100" alt="Product Image" style="height: auto; object-fit: cover;">
                  @endif
                </div>
                <div class="col-md-6 mb-4">
                  <div class="content">
                    <h4 class="professional-post-title">{{ $post->title }}</h4>
                    <p class="professional-post-body">{!! $post->body !!}</p>
                    <a href="consultancy" class="btn btn-danger">Learn More</a>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>  
  </section>
</main>

  <!-- End About Us Section -->

  {{-- <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
          <img src="assets/img/skills.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
          <h3>Our Service Distribution</h3>
          <p class="fst-italic">
            A comprehensive representation of our serivce Distribution
          </p>

          <div class="skills-content">

            <div class="progress">
              <span class="skill">Website Development <i class="val">15%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Data Analysis and Solutions <i class="val">17%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Smart house and security <i class="val">26%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Smart Energy Systems<i class="val">28%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Consultancy, Blog and Stores <i class="val">14%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            

          </div>

        </div>
      </div>

    </div>
  </section><!-- End Skills Section --> --}}

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg" style="background-color: #f9f8f8">
    <div class="container-fluid" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
      </div>

      <div class="row">
        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h5><a href="website">Websites/Blogs</a></h5>
            <p>Elevate Your Online Presence with Our Affordable Website and Blog Solutions. Perfect for Businesses and Ideas</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h5><a href="data-analysis">Data Analysis</a></h5>
            <p>We analyze and organize your business data, empowering smarter choices. Partner with us for enhanced decision-making.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-webcam"></i></div>
            <h5><a href="smart-house">Smart Systems/Gadgets</a></h5>
            <p>Unlock the power of smart home automation and other smart gadgets like tracking devices. Elevate your living and business spaces with us.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-building-house"></i></div>
            <h5><a href="smart-energy">Smart Energy Systems</a></h5>
            <p>Empower your office and home with our smart energy systems. We optimize efficiency and sustainability, paving the way for a brighter, greener future.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-user"></i></div>
            <h5><a href="consultancy">Consultancy Services</a></h5>
            <p>Navigate confidently with our expert reviews, recommendations, and curated products. We're here to help you make informed choices with ease.</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="600">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-store"></i></div>
            <h5><a href="stores">Stores</a></h5>
            <p>Empower your brand with our integrated blog platform. Showcase your products and services effortlessly, all under one roof. Sign in and amplify your reach today.</p>
          </div>
        </div>

        

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= store samples Section ======= -->
  <section class="container">
    <h3 class="text-center text-tomato">See products from our store</h3>
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        @php $counter = 0 @endphp <!-- Initialize counter -->
        @foreach($posts as $post)
          @if($post->type == 'Market')
            <div class="carousel-item {{ $counter == 0 ? 'active' : '' }}">
              <img src="{{ asset('uploads/' . $post->image) }}" class="d-block mx-auto img-fluid" style="height: 200px;">
              <div class="carousel-caption d-none d-sm-block bg-white text-black p-2 rounded" style="opacity: 0.8;">
                <h5>{{ $post->title }}</h5>
                <a href="/store/{{ $post->id }}" class="btn btn-primary">View Product</a>
              </div>
              <div class="carousel-caption d-block d-sm-none bg-white text-black p-1 rounded" style="opacity: 0.8;">
                <h6>{{ $post->title }}</h6>
                <a href="/store/{{ $post->id }}" class="btn btn-primary btn-sm">View</a>
              </div>
            </div>
            @php $counter++ @endphp
          @endif
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  
  


  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Team</h2>
      </div>

      <div class="row">
        @foreach ($posts as $post)
          @if ($post->type == "Executives")
            <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="{{ asset("uploads/". $post->image) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>{{$post->title}}</h4>
                  <span>{!! $post->body !!}</span>
                  <div class="social">
                    <a href="https://twitter.com/ChukwumaOhadoma" target="blank"><i class="ri-twitter-fill"></i></a>
                    <a href="https://web.facebook.com/people/Voltafrik/61557974579735/" target="blank"><i class="ri-facebook-fill"></i></a>
                    <a href="https://www.instagram.com/voltafrik/" target="blank"><i class="ri-instagram-fill"></i></a>
                    <a href="https://www.linkedin.com/in/chukwuma-innocent-91aaaa284/" target="blank"> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Frequently Asked Questions</h2>
        <p>Some of the frequently asked questions about Voltafrik that we belive might be helpful to you</p>
      </div>

      <div class="faq-list">
        <ul>
          <li data-aos="fade-up" data-aos-delay="100">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What types of data analysis services does Voltafrik offer?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
              <p>
                Voltafrik offers a wide range of data analysis services tailored to meet the needs of businesses across different sectors. Our services include customer behavior analysis, market trend identification, performance metric tracking, and optimization strategies.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="200">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">How does Voltafrik contribute to smart energy solutions?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Voltafrik specializes in implementing smart energy solutions that promote sustainability and efficiency. We offer services such as energy consumption monitoring, renewable energy integration, smart grid optimization, and energy management systems to help individuals and businesses reduce their carbon footprint and lower energy costs.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="300">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">What features are included in Voltafrik's smart house solutions?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Voltafrik's smart house solutions encompass a variety of features to enhance convenience, comfort, and security. These include smart lighting systems, temperature control, home automation, security cameras, energy-efficient appliances, and remote access via mobile apps for seamless control and monitoring.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="400">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Does Voltafrik provide web development services for businesses of all sizes?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes, Voltafrik caters to businesses of all sizes, from startups to large enterprises, with our comprehensive web development services. Whether you need a simple website, an e-commerce platform, or a complex web application, our team of skilled developers ensures high-quality, custom solutions tailored to your specific requirements.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="500">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed"> Does Voltafrik offer an online store platform for businesses?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes, Voltafrik provides a comprehensive online store platform tailored to meet the needs of businesses seeking to establish or expand their e-commerce presence. Our platform offers features such as customizable storefronts, secure payment gateways, inventory management, order tracking, and customer analytics. Whether you're a small boutique or a large retail chain, our e-commerce solutions empower you to create a seamless and engaging shopping experience for your customers while maximizing your online sales potential.
              </p>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

  <section id="portfolio" class="portfolio" style="background-color: #f0f0f0">
    
    <div class="container" >
      <div class="row">
        <h2 style="text-align: center; color: rgb(138, 71, 255)">Advertisement</h2>
        @foreach ($advert_posts as $post)                                                                                             
          @if($post->type == "Advert")
            <div class="col-md-3"> <!-- Adjust column size based on your layout preference -->
              <a href="{{ strip_tags($post->body) }}" target="_blank"><div class="advertisement card">    
                    <div class="card-body">   
                      <p style="text-align: center">{{$post->title}}</p>
                        @if(!empty(trim($post->image)))
                            <div>
                                <img width="auto" height="100px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">                           
                            </div>
                        @endif
                    </div>
                </div></a>
            </div>
          @endif
        @endforeach
      </div>
    </section>
  </div>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Send us a Message</h2>
      </div>

        <div class="mt-3 mt-lg-0 d-flex align-items-stretch">
          <form action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form">
            @csrf <!-- Include this line to add the CSRF token field -->
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="5" required></textarea>
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->


@endsection
