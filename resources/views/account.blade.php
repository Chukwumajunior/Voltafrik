@extends('layout.page')
@section('content1')




<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="height: 400px">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Create your acount</h1>
        <h2>Get 100% access to our blogs and stores</h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="300px" src="assets/img/inter1.png" class="img-fluid animated" alt="">
      </div>
    </div>
    
  </div>

</section><!-- End Hero -->

<!-- Registration Form -->
@if(!Auth::user())
  <div class="box-outer">
    <form method="POST" action="register">
        <h2 class="heading">Sign Up Form</h2>

        <label>Name</label>
        <input type="text" name="name" class="input-control" placeholder="Your name">

        <label>Email</label>
        <input type="email" name="email" class="input-control" placeholder="Your email address">

        <label>Password</label>
        <input type="password" name="password" class="input-control">

        <label>Comfirm Password</label>
        <input type="password" name="password_confirmation" class="input-control">

        <input type="submit" name="submit" class="button" value="Signup Now">
    </form>
    <hr>
    <div>By clicking Sign Up, you are indicating that you have read and agree to the <a href="privacy" target="_blank"><u>Terms of Use</u></a> and <a href="privacy" target="_blank"><u>Privacy Policy</u></a>.</div>
  </div>
@endif
<!--Registration Form End -->

<!-- Sigin Form -->
@if(Auth::user())
  <div class="box-outer">
    <form method="POST" action="login">
        <h2 class="heading">Sign In</h2>

        <label>Email</label>
        <input type="email" name="email" class="input-control" placeholder="Your email address">

        <label>Password</label>
        <input type="password" name="password" class="input-control">

        <input type="submit" name="submit" class="button" value="Signup Now">
    </form>
  </div>
@endif
<!--Signin Form End -->
    
@endsection