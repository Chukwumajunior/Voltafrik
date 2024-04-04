<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post: {{ $post->title }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>
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
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container-fluid blog-page">   
        <div class="row">
            <div class="col-12 pt-2">
                <div class="container-fluid blog-page">   
                    <div class="row">
                        <div class="col-12 pt-2">
                            <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                            <div class="rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                                <h1 class="display-4">Edit Post</h1>
                                <p>Edit and submit this form to update a post</p>
            
                                <hr>
            
                                <form enctype="multipart/form-data" action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="control-group col-12">
                                            <label for="title">Post Title</label>
                                            <input type="text" id="title" class="form-control" name="title"
                                            placeholder="Enter Post Title" value="{{ $post->title }}" required>
                                        </div>
                                        <div class="control-group col-12 mt-2">
                                            <label for="body">Post Body</label>
                                            <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                                      rows="5" required>{{ $post->body }}</textarea>
                                        </div>
                                        <div class="control-group col-12 mt-2">
                                            <div class="form-group mb-3">CONFIRM SUBJECT
                                                <select class="block mt-1 w-full border-gray-300 rounded-md" type="text" name="category" :value="old('category')" required>
                                                    <option value="fashion">Fashion</option>
                                                    <option value="socials">Socials</option>
                                                    <option value="vehicles">Vehicles</option>
                                                    <option value="solar_inverter">Solar and Inverters</option>
                                                    <option value="tech_news">Tech News</option>
                                                    <option value="smart_gadgets" selected>Smart Gadgets</option>
                                                    @if (Auth::User()->user_role == 'admin')    
                                                        <option value="web_project" selected>Web Projects</option>
                                                        <option value="data_project">Data Projects</option>
                                                        <option value="smart_house_project">Smart House Projects</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Feature Image</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" 
                                            accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp">
                                            <div class="current-image" style="background-image: url('{{ asset("uploads/". $post->image) }}');"></div>
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <label for="type-select">KINDLY INDICATE TYPE</label>
                                            <select id="type-select" class="block mt-1 w-full border-gray-300 rounded-md" type="text" name="type" :value="old('type')" required>
                                                <option value="Information" selected>Information</option>
                                                <option value="Market">Market: displays on the store</option>
                                                @if (Auth::User()->user_role == 'admin')    
                                                    <option value="Portfolio">Portfolio</option>
                                                    <option value="advert">Advertisement</option>
                                                    <option value="wall_main">Wall Main</option>
                                                    <option value="wall_image">Wall Image</option>
                                                    <option value="wall_video">Wall Video</option>
                                                @endif
                                            </select>
                                        </div>
                                        
                                        <div id="price-input" style="display: none;" class="form-group mb-3">
                                            <label for="price">Price:</label>
                                            <input class="block mt-1 w-full border-gray-300 rounded-md" type="text" name="price" id="price" value="{{ $post->price }}">
                                         
                                        </div>
                                    
                                    </div>
                                    <div class="row mt-2">
                                        <div class="control-group col-12 text-center">
                                            <button id="btn-submit" class="btn btn-primary">
                                                Update Post
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

   <!-- Footer -->
   <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Voltafrik &copy; 2023</span>
    </div>
</footer>

<!-- Script for dynamically showing/hiding price input -->
<script>
    document.getElementById("type-select").addEventListener("change", function() {
        var selectedOption = this.value;
        var priceInput = document.getElementById("price-input");

        if (selectedOption === "Market") {
            priceInput.style.display = "block";
        } else {
            priceInput.style.display = "none";
        }
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('textarea'))
        .catch(error => {
            console.error(error);
        });
</script>
</body>
</html>