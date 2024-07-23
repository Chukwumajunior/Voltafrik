@extends('layout.blog_app')
@section('content')

    <div class="container">
        <!-- Store Header -->
        <header class="py-4 text-center">
            <h1>{{ $blogPost->user_id }}'s Store</h1>
        </header>
        <!-- User/Store Information -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Product Information</h3>
                        <ul class="list-group list-group-flush">
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
                    @if (($post->type == 'Market') && ($post->user_id == $blogPost->user_id) && ($blogPost->id != $post->id))
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

@endsection