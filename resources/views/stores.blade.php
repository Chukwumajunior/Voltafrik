@extends('layout.blog_app')
@section('content')


<section id="hero" class="hero-section d-flex align-items-center" style="background-image: url(assets/img/bg04.jpg); background-size: cover; background-repeat: no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        @if(Auth::user())
          <h2>Welcome {{ Auth::user()->name }} to Our Store</h2>
        @endif
        <h2>Check out our products and get huge value for your money</h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/carts.png" class="img-fluid animated" alt="Store Image">
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<!-- Search and Category Dropdown -->
<section id="search-and-category" class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-3 mb-lg-0">
        <select id="category-select" class="form-control">
          <option value="" selected>All Categories</option>
          <option value="fashion">Fashion</option>
          <option value="vehicles">Vehicles</option>
          <option value="solar_inverter">Solar and Inverters</option>
          <option value="smart_gadgets">Smart Gadgets</option>
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
        @if($post->type == 'Market')
          <div class="col-lg-3 col-md-6 mb-4 post" data-category="{{ $post->category }}">
            <a href="/store/{{ $post->id }}">
              <div class="card h-100"> 
                @if(!empty(trim($post->image)))
                  <img style="width: auto; height: 150px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                  <p class="card-text">{!! ucfirst($post->body) !!}</p>
                  <p class="card-text">Price: {{ $post->price }}</p>
                  @foreach ($users as $user) 
                    @if ($user->name == $post->user_id)
                    <p>Contact:  {{ $user->tel }}</p>
                    @endif
                  @endforeach
                </div>
              </div>
            </a>
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
        const title = post.querySelector('.card-title').innerText.toLowerCase();

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
