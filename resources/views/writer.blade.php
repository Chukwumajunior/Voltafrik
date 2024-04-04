<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writer Page</title>
    <title>Product Information</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/profile">Profile</a>
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

<section style="background-color: rgb(214, 209, 209)">

    <div class="container">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Writer Panel</h1>
        </div>
    </div>

    <div class="container">
        <input type="text" id="searchInput" placeholder="Search..." style="margin-right: 20px;">
        <a href="../blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Posts</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($posts as $post) 
                    <tr>     
                        <td>{{ $post->user_id }}</td>
                        <td><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></td>
                        <td>
                            <form method="POST" action="/blog/{{ $post->id }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Voltafrik &copy; 2023</span>
    </div>
  </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('tableBody');
            const rows = tableBody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function(event) {
                const searchText = event.target.value.toLowerCase();
                
                Array.from(rows).forEach(row => {
                    const cells = row.getElementsByTagName('td');
                    let found = false;
                    for (let i = 0; i < cells.length; i++) {
                        const cellText = cells[i].textContent.toLowerCase();
                        if (cellText.includes(searchText)) {
                            found = true;
                            break;
                        }
                    }
                    row.style.display = found ? '' : 'none';
                });
            });
        });
    </script>
</body>
</html>

