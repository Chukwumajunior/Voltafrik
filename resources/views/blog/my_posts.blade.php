@extends('layout.blog_app')
@section('content')
 
  <section>
  <!-- ======= About Us Section ======= -->
    <div class="container pt-4" data-aos="fade-u">
      <div class="container">
        @foreach($posts as $post)
          @if(Auth::user())
            @if(Auth::user()->name == $post->user_id)
                <h1>Dear {{ $post->user_id }}, welcome to your Blog</h1>
            @break
            @else
                <h1>Welcome to {{ $post->user_id }}'s Blog</h1>
            @break
            @endif
          @else
            <h1>Welcome to {{ $post->user_id }}'s Blog</h1>
          @break
          @endif
        @endforeach
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by post title">
        <!-- Display Posts -->
        <div class="row" style="display: flex; flex-wrap: wrap;" id="postsContainer">
            @php
                $filteredPosts = $posts->filter(function ($post) {
                    return $post->category != "Advert" && $post->type != "Wall video" && $post->type != "Executives";
                });
            @endphp

            @if($filteredPosts->isEmpty())
                <p>Dear user, you do not have any blog posts yet. Click <a href="create-post">Add Post</a> to initiate your blog</p>
            @else
                @foreach($filteredPosts as $post)
                    <div class="col-md-2 mb-4" style="flex: 0 0 auto;">
                        <div class="card h-100">
                            @if(!empty(trim($post->image)))
                                <img style="width: auto; height: 100px;" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                            @endif
                            <div class="card-body">
                                <a class="card-title" href="/blog/{{ $post->id }}">{{ \Illuminate\Support\Str::limit($post->title ?? '', 20, ' ...') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
      </div>
    </div>
  </section><!-- End About Us Section -->


<script>
    // JavaScript for search functionality
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const postsContainer = document.getElementById('postsContainer');

        searchInput.addEventListener('input', function () {
            const searchText = this.value.toLowerCase().trim();
            const posts = postsContainer.querySelectorAll('.card');

            posts.forEach(post => {
                const title = post.querySelector('.card-title').textContent.toLowerCase().trim();
                if (title.includes(searchText)) {
                    post.style.display = '';
                } else {
                    post.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection