@extends('layout.blog_app')
@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light pt-0">
    <div class="container">
        <a class="navbar-brand" href="/blog">Voltablog</a>
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
                    @if((Auth::user()->user_role == 'admin') || (Auth::user()->user_role == 'writer') || (Auth::user()->user_role == 'colab'))
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
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                @endif
                @if(!Auth::user())
                    <li class="nav-link">
                        <a class="getstarted" href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-6 mb-4 post text-center">
            <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
            @if(!empty(trim($post->image)))
                <img style="max-height: 400px; max-width: 700px; min-height: 100px; max-width: 400px; display: inline-block;" src="{{ asset("uploads/". $post->image) }}" alt="Blog Image"/>
            @endif
            <p class="post-meta">Published on: {{ $post->created_at->format('F j, Y') }} || Updated on: {{ $post->updated_at->format('F j, Y') }}</p>
            <p class="author">By: {{ $post->user_id }} || Category: {{ $post->category }}</p>
            <div class="post-content" >{!! $post->body !!}</div>
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
                @endif
            @endif
            <a href="/blogger/{{ $post->id }}" class="btn btn-primary">See Author's Blog</a>
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
            @if(
                ($post1->category == $post->category) && ($post1->type != "Portfolio") && ($post1->type != "Wall video") && 
                ($post1->type != "Advert") && ($post1->type != "Executives") && ($post1->id != $post->id)
            )
                <div class="col-md-2 mb-4" style="flex: 0 0 auto;">
                    <div class="card h-100 related-post-card">
                        @if(!empty(trim($post1->image)))
                            <img style="width: auto; height: 100px;" src="{{ asset("uploads/". $post1->image) }}" class="card-img-top" alt="Related Post Image" style="height: 200px; object-fit: cover;">
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

@endsection
