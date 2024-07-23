@extends('layout.blog_app')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center hero-section" style="background-image: url({{ asset('assets/img/bg_blog.jpg') }}); height: 500px; width: auto; background-repeat: no-repeat; background-size: cover">

  <div class="container">
    <div style="font-weight: 700;" class="d-flex flex-column justify-content-center pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      
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
                <a href="{{ route('createPost') }}" class="btn btn-primary btn-sm">Add Post</a>
                <a href="{{ route('blogger.index') }}" class="btn btn-primary btn-sm">My Posts</a>
            </div>
          @endif  
        @endif 
    </div>
    
  </div>

</section><!-- End Hero -->


<section id="category-search" class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-3 mb-lg-0">
        <select id="category-select" class="form-control">
          <option value="" selected>All Categories</option>
          <option value="Fashion">Fashion</option>
          <option value="Vehicles">Vehicles</option>
          <option value="Solar inverter">Solar and Inverters</option>
          <option value="Smart gadgets">Smart Gadgets</option>
          <option value="Socials">Socials</option>
        </select>
      </div>
      <div class="col-lg-6">
        <input type="text" id="title-search-input" class="form-control" placeholder="Search by title">
      </div>
    </div>
  </div>
</section>

<section id="store-posts" class="py-5">
  <div class="container">
    <div class="row" id="filtered-posts">
      @foreach($posts as $post)
        @if (($post->type != "Portfolio") && ($post->type != "Wall video") && ($post->type != "Advert") && ($post->type != "Executives"))
          <div class="col-lg-3 post" data-category="{{ $post->category }}" data-title="{{ $post->title }}">
            <div class="card mb-4">
              @if(!empty(trim($post->image)))
                <img style="width: auto; height: 150px" src="{{ asset('uploads/' . $post->image) }}" class="card-img-top" alt="blog_image">
              @endif
              <div class="card-body">
                <p class="card-text">{{ $post->created_at->diffForHumans() }}</p>
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body ?? '', 100, ' ...') !!}</p>
                <a class="btn btn-primary" href="{{ url('blog/' . $post->id) }}">Read more →</a> 
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

<!-- JavaScript for Title Search -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const titleSearchInput = document.getElementById('title-search-input');
    const posts = document.querySelectorAll('.post');

    titleSearchInput.addEventListener('input', function() {
      const searchText = titleSearchInput.value.trim().toLowerCase();

      posts.forEach(post => {
        const title = post.dataset.title.toLowerCase();

        if (title.includes(searchText)) {
          post.style.display = 'block';
        } else {
          post.style.display = 'none';
        }
      });
    });
  });
</script>

@endsection
