<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/blog">Voltablog</a>
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
                  <a class="nav-link" href="../portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../blog">Blog</a>
                </li>
                @if (Auth::user())
                  @if((Auth::user()->user_role == 'admin') || (Auth::user()->user_role == 'colab'))
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

  <div class="container">
    <!-- Store Header -->
    <header class="py-4 text-center">
      <h1>User's Store</h1>
    </header>
        <!-- User/Store Information -->
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">User/Store Information</h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $blogPost->user_id }}</li>
              <li class="list-group-item">Location: <span id="location">Loading...</span></li>
              @foreach ($users as $user)
                @if ($user->name == $blogPost->user_id)
                  <li class="list-group-item">Contact: {{ $user->email }} || {{ $user->tel }}</li>
                @endif
              @endforeach
              <li class="list-group-item">Management: voltademy@gmail.com || +2349034152070</li>
            </ul>
            @foreach ($users as $user)
              @if ($user->name == $blogPost->user_id)
                <div class="card h-100"> 
                  @if(!empty(trim($blogPost->image)))
                    <img style="width: auto; height: auto" src="{{ asset("uploads/". $blogPost->image) }}" class="card-img-top" alt="Product Image">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{ ucfirst($blogPost->title) }}</h5>
                    <p class="card-text">{!! ucfirst($blogPost->body) !!}</p>
                    <p class="card-text">Price: {{ $blogPost->price }}</p>
                  </div>
                  @if (Auth::user())
                    @if(Auth::user()->name == $blogPost->user_id)
                      <a href="/blog/{{ $blogPost->id }}/edit" class="btn">Edit Post</a>
                      <form method="POST" action="/blog/{{ $blogPost->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                      </form>
                    @endif
                  @endif
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>

  <div class="container-fluid pt-4">
    <h2> Other Products </h2>
    <div class="row"> 
      @foreach ($posts as $post)
        @if (($post->type == 'Market') && ($post->user_id == $blogPost->user_id))
          <div class="col-lg-3 col-md-6 mb-4">
            <a href="/store/{{ $post->id }}">
              <div class="card h-100"> 
                @if(!empty(trim($post->image)))
                  <img style="width: auto; height: 100px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                  <p class="card-text">{!! ucfirst($post->body) !!}</p>
                  <p class="card-text">Price: {{ $post->price }}</p>
                </div>
              </div>
            </a>
          </div>
        @endif
      @endforeach
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Voltafrik &copy; 2023</span>
    </div>
  </footer>
   

    <script>
      // Check if geolocation is supported by the browser
      if ("geolocation" in navigator) {
        // Get the user's current position
        navigator.geolocation.getCurrentPosition(function(position) {
          // Retrieve latitude and longitude from the position object
          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;
  
          // Use latitude and longitude to fetch location information using a service like reverse geocoding
          // For simplicity, we'll just display the coordinates here
          var locationElement = document.getElementById("location");
          locationElement.textContent = "Latitude: " + latitude + ", Longitude: " + longitude;
        });
      } else {
        // Geolocation is not supported by the browser
        console.log("Geolocation is not supported by this browser.");
      }
    </script>
</body>
</html>

