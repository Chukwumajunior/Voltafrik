@extends('layout.whole')
 @section('content')

 <header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="#hero">Voltafrik</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="/">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a class="nav-link scrollto" href="#skills">Distribution</a></li>
        <li><a class="nav-link   scrollto" href="/portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
        <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li class="dropdown"><a href="#"><span>Distribution</span> <i class="bi bi-chevron-right"></i></a>
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
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background-image: url(assets/img/bg06.jpg); background-size: cover; background-repeat: no-repeat">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        @if(Auth::user())
          <h2>Welcome {{ Auth::user()->name }}</h2>
        @endif
        <h1>Better Solutions For Your Business and Home</h1>
        <h2>We are a team of talented engineers making the best of technology to serve you</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
          @if(!Auth::user())
            <a href="/consultancy" class="btn-get-started">Get Started</a>
          @endif
          @foreach ($posts as $post)
            @if($post->type == "wall_video")
              <a href="{{$post->body}}" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  {{-- <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients section-bg">
    <div class="container">

      <div class="row" data-aos="zoom-in">

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
        </div>

      </div>

    </div>
  </section><!-- End Clients Section --> --}}

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-u">
      <div class="section-title">
        <h2>About Us</h2>  
      </div>
      <div class="row">
        @foreach ($posts as $post)
          @if($post->type == "wall_main")
            <div class="col-md-6">
              <h4>{{$post->title}}</h4>
              <p>{!! $post->body !!}</p>
            </div>
            <div class="col-md-6 bg-dark-subtle">
              @if(!empty(trim($post->image)))
                <img src="{{ asset("uploads/". $post->image) }}" class="img-fluid" alt="Product Image">
              @endif
            </div>
          @endif
        @endforeach
      </div>
    
    
      <div id="postContainer" class="row">
        @foreach ($posts as $post)
            @if($post->type == "wall_image")
                <div class="post col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            @if(!empty(trim($post->image)))
                                <img style="width: 100%; height: 350px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                            @endif
                        </div>
                        <div class="col-md-6 pt-1">
                            <div class="content">
                                <h4>{{$post->title}}</h4>
                                <p>{!! $post->body !!}</p>
                                <br>
                                <a href="consultancy" class="btn-learn-more btn-danger">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
      </div>
    </div>
    
    </div>
    
  </section><!-- End About Us Section -->

  <!-- ======= Why Us Section ======= -->
  {{-- {{-- <section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section><!-- End Why Us Section --> --}}

  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
          <img src="assets/img/skills.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
          <h3>Our Service Distribution</h3>
          <p class="fst-italic">
            Bellow is a bar representing our serivce focus Distribution
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
  </section><!-- End Skills Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
        <p>We are an automation/innovation tech company and we offer the following services</p>
      </div>

      <div class="row">
        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h5><a href="website">Websites/Blogs</a></h5>
            <p>We offer affordable websites and blog solutions for your businesses and ideas</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h5><a href="data-analysis">Data Analysis</a></h5>
            <p>We help analyse and organise data from your business or organisation for better decision making</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-webcam"></i></div>
            <h5><a href="smart-house">Smart House Systems</a></h5>
            <p>We provide smart house automation services as well as cheap and clean energy for your home and businesses</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-building-house"></i></div>
            <h5><a href="smart-energy">Smart Energy Systems</a></h5>
            <p>We transform offices and homes with Smart Energy Systems, optimizing efficiency and sustainability for a brighter, greener future</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-user"></i></div>
            <h5><a href="consultancy">Consultancy Services</a></h5>
            <p>We provide expert reviews, recommendations and products to help you navigate through the sea of options</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="600">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-store"></i></div>
            <h5><a href="stores">Stores</a></h5>
            <p>We provide you a platform to advertise your products through built in blogs after you have signed in</p>
          </div>
        </div>

        

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <h3>Get Started</h3>
          <p> It's a beautiful day to save more money and live that world of your dreams. 
            Hit the botton now. No time to waste! </p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="#pricing">Get Started</a>
        </div>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Stores Section ======= -->
  {{-- <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>Our Portfolio</p>
        <a href="/portfolio" class="btn-danger">Click to see all</a>
      </div>

      <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-web_projects">Web Projects</li>
        <li data-filter=".filter-data_projects">Data Projects</li>
        <li data-filter=".filter-solar_projects">Solar Projects</li>
        <li data-filter=".filter-smart_house_projects">Smart House Projects</li>
      </ul>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @if ($post == "web_projects")
              <div class="col-lg-4 col-md-6 portfolio-item filter-web_projects">
                <div class="portfolio-img"><img src="{{ asset("uploads/". $post->image) }}" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <h4>Web Projects</h4>
                  <p>Our Website Projects</p>
                  <a href="/portfolio" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
          @endif
          
          @if ($post == "data_projects")
            <div class="col-lg-4 col-md-6 portfolio-item filter-data_projects">
              <div class="portfolio-img"><img src="{{ asset("uploads/". $post->image) }}" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Data Projects</h4>
                <p>Our Data Projects</p>
                <a href="/portfolio" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          @endif
          
          @if ($post == "smart_house_projects")
            <div class="col-lg-4 col-md-6 portfolio-item filter-smart_house_projects">
              <div class="portfolio-img"><img src="{{ asset("uploads/". $post->image) }}" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Smart House Projects</h4>
                <p>Our Smart House Projects</p>
              <a href="/portfolio" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          @endif
          
          @if ($post == "solar_projects")
            <div class="col-lg-4 col-md-6 portfolio-item filter-solar_projects">
              <div class="portfolio-img"><img src="{{ asset("uploads/". $post->image) }}" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Solar Projects</h4>
                <p>Our Solar Projects</p>
              <a href="/portfolio" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          @endif
        
          @if($post->isEmpty())
              <p>No posts found for this category</p>
          @endif
      </div>
    </div>
  </section><!-- End Portfolio Section --> --}}

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Team</h2>
      </div>

      <div class="row">
        @foreach ($posts as $post)
          @if ($post->type == "executives")
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

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pricing</h2>
        <p>The prcing bellow reveals our least price for all the tiers of packages available for our customers.</p>
      </div>

      <div class="row">

        <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="box">
            <h3>Inverter/Solar</h3>
            <img width="200px" height="100px" src="assets/img/inverter.jpg">
            <ul>
              <li><i class="bx bx-check"></i> Professional/<strong><sup>$</sup>15400+</strong></li>
              <li><i class="bx bx-check"></i> Intermediate/<strong><sup>$</sup>1500+</strong></li>
              <li><i class="bx bx-check"></i> Junior/<strong><sup>$</sup>300+</strong></li>
              {{-- <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li> --}}
              
            </ul>
            <a href="smart-energy" class="buy-btn">Get Product</a>
          </div>
        </div>

        <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
          <div class="box featured">
            <h3>Website Plan</h3>
            <img width="200px" height="100px" src="assets/img/web2.jpg">
            <ul>
              <li><i class="bx bx-check"></i> Professional/<strong><sup>$</sup>10000+</strong></li>
              <li><i class="bx bx-check"></i> Intermediate/<strong><sup>$</sup>1000+</strong></li>
              <li><i class="bx bx-check"></i> Junior/<strong><sup>$</sup>200+</strong></li>
            </ul>
            <a href="website" class="buy-btn">Get Product</a>
          </div>
        </div>

        <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <h3>Data Analysis</h3>
            <img width="200px" height="100px" src="assets/img/data.png">
            <ul>
              <li><i class="bx bx-check"></i> Professional/<strong><sup>$</sup>900+</strong></li>
              <li><i class="bx bx-check"></i> Intermediate/<strong><sup>$</sup>200+</strong></li>
              <li><i class="bx bx-check"></i> Junior/<strong><sup>$</sup>50+</strong></li>
            </ul>
            <a href="data-analysis" class="buy-btn">Get Product</a>
          </div>
        </div>

        
        <div class="col-lg-3 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <h3>Smart House</h3>
            <img width="200px" height="100px" src="assets/img/smart.png">
            <ul>
              <li><i class="bx bx-check"></i> Professional/<strong><sup>$</sup>9000+</strong></li>
              <li><i class="bx bx-check"></i> Intermediate/<strong><sup>$</sup>800+</strong></li>
              <li><i class="bx bx-check"></i> Junior/<strong><sup>$</sup>100+</strong></li>
            </ul>
            <a href="smart-house" class="buy-btn">Get Product</a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Pricing Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq section-bg">
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

  <div class="container pt-4">
    <div class="row">
      <h4 style="text-align: center; color: tomato">Advertisement</h4>
      @foreach ($posts as $post)
          @if($post->type == "advert")
            <div class="col-md-3"> <!-- Adjust column size based on your layout preference -->
              <a href="{{$post->body}}"><div class="advertisement card p-2">
                <p>{{$post->title}}</p>
                    <div class="card-body">   
                        @if(!empty(trim($post->image)))
                            <div>
                                <img width="auto" height="150px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                            </div>
                        @endif
                    </div>
                </div></a>
            </div>
          @endif
      @endforeach
    </div>
  </div>


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
      </div>

      <div class="row">

        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Yaba, Lagos</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>voltademy@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+2349034152070</p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.007704263264!2d3.382847573477753!3d6.52070659347183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8cfc3a59cc3b%3A0x8e44e334aba0de41!2sAkoka%20Rd%2C%20Lagos%20Mainland%20101245%2C%20Ikeja%2C%20Lagos!5e0!3m2!1sen!2sng!4v1686563607054!5m2!1sen!2sng" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        {{-- <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form">
            @csrf <!-- Include this line to add the CSRF token field -->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
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
                <textarea class="form-control" name="message" rows="10" required></textarea>
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
      </div> --}}

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

@endsection
