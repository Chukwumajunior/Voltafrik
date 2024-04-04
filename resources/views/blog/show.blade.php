<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $post->title }}</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
         body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .rm a {
          text-decoration: none;
          text
        }
        
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }
        
        p {
            font-size: 1.1em;
            margin-bottom: 20px;
            color: #555;
        }
        
        .post {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .author {
            font-style: italic;
            color: #777;
        }
        
        .post-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .post-meta {
            margin-bottom: 20px;
            color: #888;
        }
        
        .post-meta span {
            margin-right: 10px;
        }
        
        .post-meta span:last-child {
            margin-right: 0;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .btn-danger {
            background-color: #f44336;
        }
        
        .content {
            text-align: justify;
        }
        
        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }
        
        @media screen and (max-width: 576px) {
            h1 {
                font-size: 2em;
            }
        
            p {
                font-size: 1em;
            }
        }
        
        @media screen and (max-width: 400px) {
            h1 {
                font-size: 1.5em;
            }
        
            p {
                font-size: 0.9em;
            }
        
            .btn {
                font-size: 14px;
            }
        }

  </style>
  </head>
  <body>
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
            </ul>
        </div>
    </nav>
</header>
  
  <div class="container post">
      <div class="post-content">
          <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
          <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
          @if(!empty(trim($post->image)))
          <div class="container text-center">
              <img src="{{ asset("uploads/". $post->image) }}" alt="blog image" height="350px" width="auto"/>
          </div>
          @endif 
          <p class="post-meta">Published on: {{ $post->created_at->format('F j, Y') }}</p>
          <p class="author">By: {{ $post->user_id }} || Category: {{ $post->category }}</p>
          <p class="content">{!! $post->body !!}</p>
          @if ($post->type == 'Market')
            <a href="/store/{{ $post->id }}">Click to contact sales personnel</a><hr>
            <a href="/stores">Check out other products on our store</a>
          @endif
          <hr>
          @if (Auth::user())
            @if(Auth::user()->user_role == 'writer' || Auth::user()->user_role == 'admin' || (Auth::user()->user_role == 'colab' && Auth::user()->name == $post->user_id))
                <a href="/blog/{{ $post->id }}/edit" class="btn">Edit Post</a>
                <form method="POST" action="/blog/{{ $post->id }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                </form>
                <br><br>
            @endif
          @endif
      </div>
  </div>

<div class="container-fluid">
    <div class="row">
        <h3 class="col-12">Related posts</h3>
    </div>
    <div class="row" style="display: flex; flex-wrap: wrap;">
        @foreach($posts as $post1)
            @if(($post1->category == $post->category) && ($post1->type != "Portfolio") && ($post1->type != "wall_video") && ($post1->type != "advert"))
                <div class="col-md-2 mb-4" style="flex: 0 0 auto;">
                    <div class="card h-100">&nbsp&nbsp&nbsp
                        @if(!empty(trim($post1->image)))
                            <img style="width: auto; height: 100px;" src="{{ asset("uploads/". $post1->image) }}" class="card-img-top" alt="Product Image">
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
<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Voltafrik &copy; 2023</span>
    </div>
</footer>

</body>
</html> 
  
  