@extends('layout.blog_app')
@section('content')

    <!-- Dropdown Menu for Post Categories -->
    <section id="category-dropdown" class="">
      <h4 class="text-center p-4">Welcome to Our Portfolio</h4>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <select id="category-select" class="form-control">
              <option value="" selected>All Categories</option>
              <option value="Solar inverter">Solar and Inverter Projects</option>
              <option value="Web project">Website Projects</option>
              <option value="Data project">Data Projects</option>
              <option value="Smart house project">Smart House Projects</option>
            </select>
          </div>
        </div>
      </div>  
    </section>

    <section id="store-posts" class="">
      <div class="container">
        <div class="row" id="filtered-posts">
          @foreach($posts as $post)
            @if($post->type == 'Portfolio')
              <div class="col-lg-6 col-md-6 mb-4 post" data-category="{{ $post->category }}">
                <div class="card h-100"> 
                  @if(!empty(trim($post->image)))
                    <img style="width: auto; height: 300px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-body">{!! $post->body !!}</p>
                    @if (Auth::user())
                      @if(Auth::user()->user_role == 'admin')
                        <a href="/blog/{{ $post->id }}/edit" class="btn btn-info">Edit</a>
                        <form method="POST" action="/blog/{{ $post->id }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                        </form>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </section>

<script>
  // Wait for the DOM to be fully loaded
  $(document).ready(function() {
    // Filter posts by category
    $('#category-select').change(function() {
      var category = $(this).val();
      if (category === '') {
        $('.post').show();
      } else {
        $('.post').hide();
        $('.post[data-category="' + category + '"]').show();
      }
    });
  });
</script>

@endsection