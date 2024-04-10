@extends('layout.blog_app')
@section('content')

<!-- ======= Hero Section ======= -->
<section class="hero-section d-flex align-items-center" style="color: white; background-image: url(assets/img/solar_bg2.jpg); background-size: cover; background-repeat: no-repeat">
  <div class="container" style="padding-bottom: 8rem; padding-top: 7rem">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Smart Energy Systems</h1>
        <h2>Solve your energy issues for your home and business</h2>
      </div>
      {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="200px" src="assets/img/solar_.png" class="img-fluid animated" alt="">
      </div> --}}
    </div>
  </div>

</section><!-- End Hero -->
<div class="container pt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <img src="assets/img/res_solar.jpg" class="card-img-top" alt="Residential Solutions">
        <div class="card-body">
          <h2 class="card-title">Residential Solutions</h2>
          <p class="card-text">Voltafrik offers a range of smart energy solutions tailored to meet the unique needs of your home. From solar panels and battery storage to energy-efficient appliances, we help you reduce your electricity bills while minimizing your environmental footprint.</p>
          <ul class="list-group">
            <li class="list-group-item">Customized solar panel installations</li>
            <li class="list-group-item">Energy storage solutions for backup power</li>
            <li class="list-group-item">Smart home integration for efficient energy management</li>
            <li class="list-group-item">Electric vehicle charging stations</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-4">
        <img src="assets/img/comm_solar.jpg" class="card-img-top" alt="Commercial Solutions">
        <div class="card-body">
          <h2 class="card-title">Commercial Solutions</h2>
          <p class="card-text">For businesses looking to optimize their energy usage and reduce operational costs, Voltafrik provides advanced smart energy systems. Our comprehensive solutions are designed to enhance sustainability and increase profitability.</p>
          <ul class="list-group">
            <li class="list-group-item">Commercial-grade solar power systems</li>
            <li class="list-group-item">Battery storage solutions for demand management</li>
            <li class="list-group-item">Energy monitoring and analytics platforms</li>
            <li class="list-group-item">LED lighting retrofits for energy efficiency</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


    
@endsection