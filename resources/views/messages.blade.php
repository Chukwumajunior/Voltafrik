<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Voltafrik</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../profile/admin/visitors">Traffic monitor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../profile/admin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/admin/writer">Manage Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../stores">Store</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="../../profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <p>Inbox: You have {{ count($messages) }} messages</p>

        <input type="text" id="searchInput" class="form-control mb-4" placeholder="Search messages">

        <div id="searchResults">
            @foreach ($messages as $message)
                <div class="list-group-item">
                    <h5 class="mb-1">{{ $message->name }} || {{ $message->email }}</h5>
                    <p class="mb-1">{{ $message->message }}</p>
                    <form action="{{ route('contact.destroy', $message->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <span class="text-muted">Voltafrik &copy; 2023</span>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete(messageId) {
            if (confirm("Are you sure you want to delete this message?")) {
                document.getElementById('delete-form-' + messageId).submit();
            }
        }
    </script>
    <script>
        // Get the search input element
        const searchInput = document.getElementById('searchInput');

        // Add an event listener for input change
        searchInput.addEventListener('input', function() {
            const query = this.value.trim().toLowerCase(); // Get the search query

            // Get all message items
            const messages = document.querySelectorAll('.list-group-item');

            // Filter messages based on the search query
            messages.forEach(message => {
                const name = message.querySelector('h5').textContent.toLowerCase();
                const email = message.querySelector('h5').nextElementSibling.textContent.toLowerCase();
                const msg = message.querySelector('p').textContent.toLowerCase();
                const isVisible = name.includes(query) || email.includes(query) || msg.includes(query);
                message.style.display = isVisible ? 'block' : 'none'; // Show/hide message based on visibility
            });
        });
    </script>

</body>
</html>
