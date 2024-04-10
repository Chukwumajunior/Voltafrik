@extends('layout.blog_app')
@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background-image: url(assets/img/bg_blog2.jpg); height: 500px; width: auto; background-repeat: no-repeat">

  <div class="container">
    <div style="font-weight: 700;" class= "d-flex flex-column justify-content-center pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      
        <h2>Welcome 
          @if(Auth::user())
          {{ Auth::user()->name }}
          @endif 
          To VoltaBlog.
        </h2>
          <h2> There are {{ $posts_sum }} Posts
          @if(Auth::user())
            @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'writer' || Auth::user()->user_role == 'colab')          
            and You have {{ $myPost_sum }} Posts
            @endif
          @endif
        </h2>
        @if(Auth::user())
          @if(Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'writer' || Auth::user()->user_role == 'colab')
            <div class="col-12">
                <a href="./blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                <a href="./my_posts" class="btn btn-primary btn-sm">My Posts</a>
            </div>
          @endif  
        @endif 
    </div>
    
  </div>

</section><!-- End Hero -->



<section id="category-dropdown" class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <select id="category-select" class="form-control">
          <option value="">All Categories</option>
          <option value="fashion" selected>Fashion</option>
          <option value="vehicles" selected>Vehicles</option>
          <option value="solar_inverter" selected>Solar and Inverters</option>
          <option value="smart_gadgets" selected>Smart Gadgets</option>
          <option value="socials" selected>Socials</option>
        </select>
      </div>
    </div>
  </div>
</section>

<section id="store-posts" class="py-5">
  <div class="container">
    <div class="row" id="filtered-posts">
      @foreach($posts as $post)
        @if (($post->type != "Portfolio") && ($post->type != "wall_video") && ($post->type != "advert") && ($post->type != "executives"))
          <div class="col-lg-3 post" data-category="{{ $post->category }}">
            <div class="card mb-4">
              @if(!empty(trim($post->image)))
                <img style="width: auto; height: 150px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="blog_imag">
              @endif
              <div class="card-body">
                <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body ?? '',100,' ...') !!}</p>
                <a class="btn btn-primary" href="/blog/{{ $post->id }}">Read more →</a> 
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

@endsection