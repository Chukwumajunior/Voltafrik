<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: Edit Post: {{ $post->title }}</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: #007bff !important;
        }
        .navbar-nav .nav-link {
            color: #495057 !important;
        }
        .navbar-toggler {
            border-color: #007bff !important;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .footer {
            background-color: #f8f9fa;
        }
        .footer .text-muted {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
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
                        @if (Auth::check())
                            @if(Auth::user()->user_role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('createPost') }}">Create Post</a>
                                </li>
                            @endif
                        @endif
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
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container-fluid blog-page">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="display-4">Edit Post</h2>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Enter Post Title" value="{{ $post->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Post Body</label>
                                <div id="quill-editor"></div>
                                <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body" rows="5" style="display: none;">{{ $post->body }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Feature Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" accept="image/*">
                                <div class="current-image" style="background-image: url('{{ asset("uploads/". $post->image) }}');"></div>
                            </div>
                            <div class="form-group">
                                <label for="category-select">Category</label>
                                <select id="category-select" class="form-control" name="category" required>
                                    <option style="color: red" value="{{ $post->category }}" selected>{{ $post->category }}</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Socials">Socials</option>
                                    <option value="Vehicles">Vehicles</option>
                                    <option value="Solar inverter">Solar and Inverters</option>
                                    <option value="Tech news">Tech News</option>
                                    <option value="Smart gadgets">Smart Gadgets</option>
                                    @if ((Auth::User()->user_role == 'admin') || (Auth::User()->user_role == 'writer'))      
                                    <option value="Web project">Web Projects</option>
                                        <option value="Data project">Data Projects</option>
                                        <option value="Smart house project">Smart House Projects</option>
                                        <option value="Advert">Advert</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type-select">Type</label>
                                <select id="type-select" class="form-control" name="type" required>
                                    <option style="color: red" value="{{ $post->type }}" selected>{{ $post->type }}</option>
                                    <option value="Information">Information</option>
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
                            <div id="price-input" class="form-group" style="display: none;">
                                <label for="price">Price</label>
                                <input class="form-control" type="text" name="price" id="price" value="{{ $post->price }}">
                            </div>
                            <div class="form-group text-center">
                                <button id="btn-submit" class="btn btn-primary btn-lg">Update Post</button>
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

    <!-- Quill Editor Script -->
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

        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Enter Post Body',
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
