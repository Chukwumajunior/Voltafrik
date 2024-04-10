@extends('layout.blog_app')
@section('content')


<!-- ======= Hero Section ======= -->
<section class="hero-section d-flex align-items-center" style="color: white; background-image: url(assets/img/web_blog.jpg); background-size: cover; background-repeat: no-repeat">
  <div class="container" style="padding-bottom: 8rem; padding-top: 7rem">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Website & Blog</h1>
        <h2>Do business efficiently with our websites & blogs</h2>
      </div>
      {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="200px" src="assets/img/why-us.png" class="img-fluid animated" alt="">
      </div> --}}
    </div>
  </div>
</section><!-- End Hero -->

<div class="container pt-4">
  <div class="row">
    <div class="col-md-6">
      <h2>Professional Websites</h2>
      <p>At Voltafrik Company, we specialize in crafting professional and visually appealing websites tailored to your business needs. Our team of skilled designers and developers work closely with you to create a unique online presence that reflects your brand identity and effectively communicates your message to your target audience.</p>
      <p>With our expertise in Bootstrap, we ensure that your website is responsive and optimized for all devices, providing a seamless user experience across desktops, tablets, and smartphones.</p>
      <p>Whether you need a simple brochure website, an e-commerce platform, or a complex web application, Voltafrik Company has the solution for you. Let us help you establish a strong online presence and drive business growth.</p>
    </div>
    <div class="col-md-6">
      <img src="assets/img/web_.jpg" class="img-fluid" alt="Website Design">
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <img src="assets/img/blog_.jpg" class="img-fluid" alt="Blog">
    </div>
    <div class="col-md-6">
      <h2>Engaging Blogs</h2>
      <p>Enhance your online presence and engage with your audience through compelling blog content. Our team of experienced writers can help you create high-quality, SEO-friendly blog posts that drive traffic to your website and establish you as an authority in your industry.</p>
      <p>Whether you want to educate your audience, share industry insights, or promote your products and services, our content creators will tailor each blog post to meet your specific goals and target audience.</p>
      <p>With Voltafrik Company's blog services, you can attract more visitors to your website, increase brand awareness, and ultimately drive conversions and revenue for your business.</p>
    </div>
  </div>
</div>


    
@endsection