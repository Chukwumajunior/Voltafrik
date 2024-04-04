<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Portfolio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Header -->
  <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/stores">Store</a>
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

<!-- Dropdown Menu for Post Categories -->
<section id="category-dropdown" class="py-3">
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

<section id="store-posts" class="py-5">
  <div class="container">
    <div class="row" id="filtered-posts">
      @foreach($posts as $post)
        @if($post->type == 'Portfolio')
          <div class="col-lg-3 col-md-6 mb-4 post" data-category="{{ $post->category }}">
            <a href="/blog/{{ $post->id }}">
              <div class="card h-100"> 
                @if(!empty(trim($post->image)))
                  <img style="width: auto; height: 150px" src="{{ asset("uploads/". $post->image) }}" class="card-img-top" alt="Product Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                    <p class="card-text">{!! ucfirst($post->body) !!}</p>
                </div>
              </div>
            </a>
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