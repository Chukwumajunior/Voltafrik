<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: Store</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <div class="container">
        <!-- Store Header -->
        <header class="py-4 text-center">
            <h1>User's Store</h1>
        </header>
        <!-- User/Store Information -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">User/Store Information</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $blogPost->user_id }}</li>
                            @foreach ($users as $user)
                                @if ($user->name == $blogPost->user_id)
                                    <li class="list-group-item">Contact: {{ $user->email }} || {{ $user->tel }}</li>
                                @endif
                            @endforeach
                            <li class="list-group-item">Management: voltademy@gmail.com || +2349034152070</li>
                        </ul>
                        @foreach ($users as $user)
                            @if ($user->name == $blogPost->user_id)
                                <div class="card mt-4">
                                    @if(!empty(trim($blogPost->image)))
                                        <img src="{{ asset("uploads/". $blogPost->image) }}" class="card-img-top" alt="Product Image">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ ucfirst($blogPost->title) }}</h5>
                                        <p class="card-text">{!! ucfirst($blogPost->body) !!}</p>
                                        <p class="card-text">Price: {{ $blogPost->price }}</p>
                                    </div>
                                </div>
                                @if (Auth::user() && Auth::user()->name == $blogPost->user_id)
                                    <div class="text-center mt-4">
                                        <a href="/blog/{{ $blogPost->id }}/edit" class="btn btn-primary mr-2">Edit Post</a>
                                        <form method="POST" action="/blog/{{ $blogPost->id }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Other Products</h2>
            <div class="row">
                @foreach ($posts as $post)
                    @if (($post->type == 'Market') && ($post->user_id == $blogPost->user_id))
                        <div class="col-lg-3 col-md-6 mb-4">
                            <a href="/store/{{ $post->id }}">
                                <div class="card h-100">
                                    @if(!empty(trim($post->image)))
                                        <img src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
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
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Voltafrik &copy; 2023</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
