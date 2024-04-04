@extends('layout.blog_app')

@section('content')   
    
  <!-- ======= About Us Section ======= -->
  <section id="about" class="about mt-4">
    <div class="container" data-aos="fade-u">
      <div class="section-title">
        <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
      </div>

    </div>
    <div class="container" style="color: white">
      @foreach($posts as $post)
        @if ($author == $post->user_id)
          <li class="bx bx-star"><a href="/blog/show/{{ $post->id }}">{{ ucfirst($post) }}</a></li>
        @endif
      @endforeach
    </div>
  </section><!-- End About Us Section -->

  
  
@endsection