
@extends('layout.blog_app')
@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center bg-secondary" style="height: 400px">

    <div class="container">
        <div style="text-align: center" data-aos="fade-up" data-aos-delay="200">
            <h1>Contact us</h1>
        </div>
      </div>
    </div>
  
    
  
  </section><!-- End Hero -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

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
      </div>
   
   

        <div class="col-lg-12 mt-5">
          <div class="section-title">
            <h3 style="color: rgb(138, 71, 255)">Send us a Message</h3>
            <p> Please ensure your details are correct else we may not be able to reach you. Thanks.</p>
          </div>
          <form action="{{ route('contact.store') }}" method="post">
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
            <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea style="resize: none" class="form-control" name="message" rows="7" required></textarea>
            </div>
            <div class="text-center mt-4"><button type="submit" class="btn btn-primary">Send Message</button></div>
          </form>
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

  @endsection