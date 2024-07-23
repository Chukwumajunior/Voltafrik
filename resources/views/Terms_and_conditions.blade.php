@extends('layout.blog_app')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center bg-primary" style="height: 400px">

  <div class="container">
    <div style="text-align: center" data-aos="fade-up" data-aos-delay="200">
      <h1>Our Terms and conditions</h1>
      <h2>Kindly read our T & C Bellow</h2>
    </div>
      {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img width="300px" src="assets/img/security.png" class="img-fluid animated" alt="">
      </div> --}}
    </div>
  </div>

</section><!-- End Hero -->

<div class="container pt-4">
  <h1>Terms and Conditions</h1>

    <p>These terms and conditions outline the rules and regulations for the use of Voltafrik's Website, located at <a href="https://www.voltafrik.com.ng">https://www.voltafrik.com.ng</a>.</p>

    <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Voltafrik if you do not agree to take all of the terms and conditions stated on this page.</p>

    <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>

    <h2>Cookies</h2>

    <p>We employ the use of cookies. By accessing Voltafrik, you agreed to use cookies in agreement with the Voltafrik's Privacy Policy.</p>

    <p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>

    <h2>License</h2>

    <p>Unless otherwise stated, Voltafrik and/or its licensors own the intellectual property rights for all material on Voltafrik. All intellectual property rights are reserved. You may access this from Voltafrik for your own personal use subjected to restrictions set in these terms and conditions.</p>

    <p>You must not:</p>
    <ul>
        <li>Republish material from Voltafrik</li>
        <li>Sell, rent or sub-license material from Voltafrik</li>
        <li>Reproduce, duplicate or copy material from Voltafrik</li>
        <li>Redistribute content from Voltafrik</li>
    </ul>

    <p>This Agreement shall begin on the date hereof.</p>

    <h2>Limitation of liability</h2>

    <p>In no event shall Voltafrik, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract. Voltafrik, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

    <h2>Indemnification</h2>

    <p>You hereby indemnify to the fullest extent Voltafrik from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

    <h2>Severability</h2>

    <p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

    <h2>Variation of Terms</h2>

    <p>Voltafrik is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

    <h2>Entire Agreement</h2>

    <p>These Terms constitute the entire agreement between Voltafrik and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>

    <h2>Governing Law & Jurisdiction</h2>

    <p>These Terms will be governed by and interpreted in accordance with the laws of the Federal Republic of Nigeria, and you submit to the non-exclusive jurisdiction of the state and federal courts located in the Federal Republic of Nigeria for the resolution of any disputes.</p>

    <h2>Contact Us</h2>

    <p>If you have any questions or suggestions about our Terms and Conditions, do not hesitate to contact us at <a href="mailto:voltademy@gmail.com">voltademy@gmail.com</a> or send us a direct message from our <a href="{{ route('contact') }}">Contact Form</a></p>
    <p>Also see our <a href="{{ route('privacy') }}">Privacy Policy</a></p>
  </div>
  


    
@endsection