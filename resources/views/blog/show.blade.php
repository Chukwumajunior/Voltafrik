<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: {{ $post->title }}</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 60px; /* Make space for navbar */
        }

        .navbar {
            background-color: #fff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #333;
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link {
            color: #333 !important;
        }

        .post {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .post h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .post img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .post-meta, .author {
            color: #777;
            margin-bottom: 20px;
        }

        .post-content {
            text-align: justify;
            color: #555;
        }

        .btn-edit {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }

        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #fff;
        }

        .related-posts {
            margin-top: 30px;
        }

        .related-posts h3 {
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        .related-post-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .related-post-card img {
            max-width: 100%;
            border-radius: 10px 10px 0 0;
        }

        .related-post-card .card-body {
            padding: 20px;
        }

        .related-post-card .card-title {
            font-size: 1.2em;
            color: #333;
        }

        .footer {
            background-color: #f8f9fa;
            color: #777;
            padding: 20px 0;
            text-align: center;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 576px) {
            .post h1 {
                font-size: 2em;
            }

            .related-post-card {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light pt-0">
    <div class="container">
        <a class="navbar-brand" href="/">Voltafrik</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../stores">Store</a>
                </li>
                @if (Auth::user())
                    @if(Auth::user()->user_role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="../create/post">Create Post</a>
                    </li>
                    @endif
                @endif
                @if(Auth::User())
                    <li class="nav-item">
                        <a class="nav-link" href="../profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container pt-2">
    <div class="row">
        <div class="col-lg-12 col-md-6 mb-4 post">
            <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            @if(!empty(trim($post->image)))
                <img src="{{ asset("uploads/". $post->image) }}" alt="Blog Image"/>
            @endif
            <p class="post-meta">Published on: {{ $post->created_at->format('F j, Y') }} || Updated on: {{ $post->updated_at->format('F j, Y') }}</p>
            <p class="author">By: {{ $post->user_id }} || Category: {{ $post->category }}</p>
            <div class="post-content">{!! $post->body !!}</div>
            @if ($post->type == 'Market')
                <a href="/store/{{ $post->id }}">Click to contact sales personnel</a><hr>
                <a href="/stores">Check out other products on our store</a>
            @endif
            <hr>
            @if (Auth::user())
                @if((Auth::user()->user_role == 'writer' || Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'colab') && (Auth::user()->name == $post->user_id))
                    <a href="/blog/{{ $post->id }}/edit" class="btn btn-edit">Edit Post</a>
                    <form method="POST" action="/blog/{{ $post->id }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                    </form>
                    <a href="../my_posts" class="btn btn-primary">See author's posts</a>
                @endif
            @endif
        </div>
    </div>
</div>

<!-- Related Posts -->
<div class="container related-posts">
    <div class="row">
        <div class="col-12">
            <h3>Related Posts</h3>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post1)
            @if(($post1->category == $post->category) && ($post1->type != "Portfolio") && ($post1->type != "wall_video") && ($post1->type != "advert") && ($post1->type != "executives"))
                <div class="col-md-3 mb-4">
                    <div class="card related-post-card">
                        @if(!empty(trim($post1->image)))
                            <img src="{{ asset("uploads/". $post1->image) }}" class="card-img-top" alt="Related Post Image">
                        @endif
                        <div class="card-body">
                            <a class="card-title" href="/blog/{{ $post1->id }}">{{ \Illuminate\Support\Str::limit($post1->title ?? '',20,' ...') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        &copy; 2023 Voltafrik
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
