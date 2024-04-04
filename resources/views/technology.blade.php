@extends('layout.blog_app')
@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="height: 400px">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Technologies</h1>
        <h2>The future is on your palm. Live your dreams</h2>
      </div>
      {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="400px" src="assets/img/why-us.png" class="img-fluid animated" alt="">
      </div> --}}
    </div>
  </div>

</section><!-- End Hero -->

<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/inverter.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <a href="smart-energy"><h4>Inverter/Solar</h4></a>
            <p>We provide cheap and clean energy for your home and businesses</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/data.png" class="img-fluid" alt=""></div>
          <div class="member-info">
            <a href="data-analysis"><h4>Data Analysis</h4></a>
            <p>We help analyse and organise data from your business or organisation for better decision making</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/smart.png" class="img-fluid" alt=""></div>
          <div class="member-info">
            <a href="smart-house"><h4>Smart House Systems</h4></a>
            <p>We provide smart house automation services for your home and businesses</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/web2.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <a href="website"><h4>Websites and Blog</h4></a>
            <p>We offer affordable websites and blog solutions for your businesses and ideas</p>
          </div>
        </div>
      </div>

    </div>
  </div>

    
@endsection