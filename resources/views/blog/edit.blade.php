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
    <!-- CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
                        <a class="nav-link" href="../blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../stores">Store</a>
                    </li>
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

    <!-- Content -->
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
                                <input type="text" id="title" class="form-control" name="title" placeholder="Enter Post Title" value="{{ $post->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <div class="control-group col-12 mt-2" style="padding-bottom: 6rem">
                                    <label for="body">Post Body</label>
                                    <!-- Add an ID for Quill editor -->
                                    <div id="quill-editor"></div>
                                    <!-- Hide the textarea -->
                                    <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                          rows="5" required style="display: none;">{{ $post->body }}</textarea>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="exampleFormControlFile1">Feature Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" 
                                accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp">
                                <div class="current-image" style="background-image: url('{{ asset("uploads/". $post->image) }}');"></div>
                            </div>
                            <div class="control-group col-12 mt-4">
                                <div class="form-group mb-3">
                                    <label for="category-select">Category</label>
                                    <select id="category-select" class="form-control" name="category" :value="old('category')" required>
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
                        
                            <div class="form-group col-12 mt-2">
                                <label for="type-select">Type</label>
                                <select id="type-select" class="form-control" name="type" :value="old('type')" required>
                                    <option value="Information" selected>Information</option>
                                    <option value="Market">Market: displays on the store</option>
                                    @if (Auth::User()->user_role == 'admin')    
                                        <option value="Portfolio">Portfolio</option>
                                        <option value="advert">Advertisement</option>
                                        <option value="wall_main">Wall Main</option>
                                        <option value="wall_image">Wall Image</option>
                                        <option value="wall_video">Wall Video</option>
                                        <option value="executives">Executives</option>
                                    @endif
                                </select>
                            </div>
                            
                            <div id="price-input" style="display: none;" class="form-group col-12">
                                <label for="price">Price</label>
                                <input class="form-control" type="text" name="price" id="price" value="{{ $post->price }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">Update Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Voltafrik &copy; 2023</span>
        </div>
    </footer>

    <script>
        // Initialize Quill
        var quill = new Quill('#quill-editor', {
            theme: 'snow', // Specify the theme
            placeholder: 'Enter Post Body', // Specify the placeholder text
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['link', 'image'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['clean']
                ]
            }
        });
        quill.root.innerHTML = {!! json_encode($post->body) !!};

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('body').value = quill.root.innerHTML;
        });
    </script>
</body>
</html>
