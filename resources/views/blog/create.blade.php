<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: Create Post</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Voltafrik</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stores') }}">Store</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endif
                </ul>
                
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container-fluid blog-page" style="background-image: url(assets/img/blog.jpg); background-size: cover; background-repeat: no-repeat">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="display-4 text-center">Create a New Post</h2>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Enter Post Title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Post Body</label>
                                <div id="quill-editor"></div>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body" rows="5" style="display: none;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Feature Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" accept="image/apng, image/avif, image/gif, image/jpeg, image/png, image/svg+xml, image/webp">
                            </div>
                            <div class="form-group">
                                <label for="category-select">Category</label>
                                <select id="category-select" class="form-control" name="category" :value="old('category')" required>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Socials">Socials</option>
                                    <option value="Vehicles">Vehicles</option>
                                    <option value="Solar inverter">Solar and Inverters</option>
                                    <option value="Tech news">Tech News</option>
                                    <option value="Smart gadgets" selected>Smart Gadgets</option>
                                    @if ((Auth::User()->user_role == 'admin') || (Auth::User()->user_role == 'writer'))  
                                        <option value="Web project" selected>Web Projects</option>
                                        <option value="Data project">Data Projects</option>
                                        <option value="Smart house project">Smart House Projects</option>
                                        <option value="Advert">Advert</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type-select">Type</label>
                                <select id="type-select" class="form-control" name="type" :value="old('type')" required>
                                    <option value="Information" selected>Information</option>
                                    <option value="Market">Market: displays on the store</option>
                                    @if ((Auth::User()->user_role == 'admin') || (Auth::User()->user_role == 'writer'))    
                                        <option value="Portfolio">Portfolio</option>
                                        <option value="Wall video">Wall Video</option>
                                        <option value="Wall Image1">Wall Image1</option>
                                        <option value="Wall image2">Wall Image2</option>
                                        <option value="Advert">Advert</option>
                                        <option value="Executives">Executives</option>
                                    @endif
                                </select>
                            </div>
                            <div id="price-input" style="display: none;" class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control" type="text" name="price" id="price">
                            </div>
                            <div class="form-group text-center">
                                <button id="btn-submit" class="btn btn-primary btn-lg">Create Post</button>
                            </div>
                        </form>
                    </div>
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

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('body').value = quill.root.innerHTML;
        });
    </script>
</body>
</html>
