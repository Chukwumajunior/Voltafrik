<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: Portfolio</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../stores">Store</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../blog">Blog</a>
                </li>
                @if (Auth::user())
                  @if(Auth::user()->user_role == 'admin')
                    <li class="nav-item">
                      <a class="nav-link" href="../blog/create/post">Create Post</a>
                    </li>
                  @endif
                @endif
                @if(Auth::User())
                  <li class="nav-item">
                    <a class="nav-link" href="../profile">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">logout</a>
                  </li>
                @endif
            </ul>
        </div>
      </nav>
    </header>
    <!-- Dropdown Menu for Post Categories -->
    <section id="category-dropdown" class="">
      <h4 class="text-center p-4">Welcome to Our Portfolio</h4>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <select id="category-select" class="form-control">
              <option value="">All Categories</option>
              <option value="solar_inverter" selected>Solar and Inverter Projects</option>
              <option value="web_project" selected>Website Projects</option>
              <option value="data_project" selected>Data Projects</option>
              <option value="smart_house_project" selected>Smart House Projects</option>
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
                    <h5 class="card-title">{{ ($post->title) }}</h5>
                    <p class="card-body">{!! $post->body !!}</p>
                    @if (Auth::user())
                      @if(Auth::user()->user_role == 'admin')
                        <a href="/blog/{{ $post->id }}/edit" class="btn btn-info">Edit Portfolio</a>
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

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
      <div class="container text-center">
          <span class="text-muted">Voltafrik &copy; 2023</span>
      </div>
    </footer>
  </div>

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


</body>
</html>