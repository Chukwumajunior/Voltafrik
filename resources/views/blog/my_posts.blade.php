<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
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
    
  <!-- ======= About Us Section ======= -->
  <div class="container">
    <div class="container" data-aos="fade-u">
    </div>
    <div class="container">
      @foreach($posts as $post)
        <h1>Welcome To {{$post->user_id}}'s Blog</h1>
        @break
      @endforeach
      <div class="row" style="display: flex; flex-wrap: wrap;">
        @foreach($posts as $post)
          @if($post->user_id == Auth::user()->name && $post->category != "advert" && $post->type != "wall_video")
            <div class="col-md-2 mb-4" style="flex: 0 0 auto;">
                <div class="card h-100">&nbsp&nbsp&nbsp
                    @if(!empty(trim($post->image)))
                        <img style="width: auto; height: 100px;" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                    @endif
                    <div class="card-body">
                        <a class="card-title" href="/blog/{{ $post->id }}">{{ \Illuminate\Support\Str::limit($post->title ?? '',20,' ...') }}</a>
                    </div>
                </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section><!-- End About Us Section -->

  <!-- Footer -->
<footer class="footer mt-auto py-3 bg-light">
  <div class="container text-center">
      <span class="text-muted">Voltafrik &copy; 2023</span>
  </div>
</footer>


</body>
</html>