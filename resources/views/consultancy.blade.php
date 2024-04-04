@extends('layout.whole')
@section('content')

 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="#hero">Voltafrik</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="/">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">Account</a></li>
        <li><a class="nav-link scrollto" href="#services">Needs</a></li>
        <li><a class="nav-link scrollto" href="#team">Chat</a></li>
        <li class="dropdown"><a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="consult">Consultancy</a></li>
                  <li><a href="smart-energy">Smart Energy</a></li>
                  <li><a href="smart-house">Smart House</a></li>
                  <li><a href="website">Website</a></li>
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
          <li><a class="getstarted" href="/login">Get Started</a></li>
        @endif
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style=" background-image: url(assets/img/bg07.jpg); background-size: cover; background-repeat: no-repeat">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Consultancy</h1>
        <h2>All that you need to know</h2>  
      </div>
      {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="300px" src="assets/img/chat.png" class="img-fluid animated" alt="">
      </div> --}}
    </div>
    
  </div>

</section><!-- End Hero -->


  <!-- ======= Acount Section ======= -->
  <section id="about" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">
      <div class="section-title">
        <h2>Having an Account</h2>  
      </div>

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <p>
              Having an account with us offers several benefits and advantages that enhance your overall experience and provide convenience. 
              Here are some key reasons why having an account with us is important.
              <a href="register" class="btn-learn-more">Create account</a>
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Personalized Experience<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    By creating an account, you can customize your preferences and settings according to your needs. 
                    This allows us to provide a personalized experience tailored to your preferences and interests. 
                    You may receive personalized recommendations, relevant content, and exclusive offers based on your 
                    account information and activity.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Easy Access to Services<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Having an account grants you easy access to our services and features. You can log in quickly using your 
                    credentials and save time by not having to re-enter your details every time you visit our platform. 
                    It simplifies the process of engaging with our services, making it more convenient for you.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Order Tracking and History<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    When you have an account, you can track your orders, view your purchase history, and access detailed information 
                    about your past interactions with us. This feature enables you to easily keep track of your activities, 
                    reorder items, and review your previous transactions.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Exclusive Offers and Rewards<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    We often provide exclusive offers, discounts, and rewards to our registered account holders. By having an account, 
                    you can stay updated on the latest promotions and participate in loyalty programs, increasing your chances of 
                    accessing special deals and saving money. You are aslo entitled to a free blog and store for your business.
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/comm.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section><!-- End Account Section -->

  <!-- ======= Needs Section ======= -->
  <section id="services" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">
      <div class="section-title">
        <h2>Your Needs and Priorities</h2>
      </div>

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <p>
              Technology needs and priorities can vary depending on your context/specific goals, organization, 
              and or industry's goals. We offer varieties of technology needs that are very helpful to your business and home:
              <a href="stores" class="btn-learn-more">See our products</a>
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Reliable and Secure Infrastructure<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    A stable and secure technology infrastructure forms the foundation for any organization. This includes robust 
                    network connectivity, hardware, software, and data storage systems as well as a sound website. Ensuring the reliability, scalability, 
                    and security of the infrastructure is a top priority.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Sustainability and Green Technologies<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    As environmental concerns grow, organizations are increasingly prioritizing sustainable practices and adopting 
                    green technologies. This includes using energy-efficient hardware, implementing virtualization and cloud computing, 
                    and leveraging renewable energy sources.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Automation and Artificial Intelligence<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Automating repetitive tasks and leveraging artificial intelligence (AI) technologies can improve efficiency, 
                    productivity, and accuracy. Organizations prioritize implementing AI solutions, such as machine learning algorithms, 
                    chatbots, and robotic process automation, to streamline processes and enhance decision-making.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Data Management and Analytics<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    With the increasing amount of data generated, organizations need effective tools and strategies to manage and 
                    analyze their data. This includes data storage, data integration, data governance, and advanced analytics 
                    capabilities to derive insights and make data-driven decisions.
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section><!-- End Needs Section -->

    <!-- ======= Chat Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Chat with Volt</h2>
      </div>

    
@endsection