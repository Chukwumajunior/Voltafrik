<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: Admin</title>
    <link rel="icon" type="image/gif" href="{{ asset('assets/img/logo/logo5.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .user-list {
            max-height: calc(70vh); /* Set maximum height to 70% of viewport height */
            overflow-y: auto; /* Enable vertical scrollbar if content exceeds max height */
        }
        .message-icon {
            position: relative;
            display: inline-block;
            font-size: 24px;
        }
        .message-icon::before {
            content: '📩'; /* Emoji for message icon */
        }
        .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            padding: 5px 10px;
            border-radius: 50%;
            background: red;
            color: white;
            font-size: 12px;
        }


    </style>
    
</head>

<body>
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
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.writer') }}">Manage Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.visitors') }}">Traffic monitor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stores') }}">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('createPost') }}">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
                
            </div>
        </nav>
    </header>
    <section id="hero" class="d-flex align-items-center" style="background-color: pink">

        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <h1>Admin Panel</h1>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <a href="/profile/admin/messages">
                <div class="message-icon">
                    <div class="badge">{{ $count_msg }}</div>
                </div>
            </a>

            
        </div>
        </div>
      
      </section><!-- End Hero -->

    <div class="container-fluid">
        <p>Users List (<span id="filterCounter">0</span> filtered)</p>
        <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded shadow-sm mb-4">
            <div class="text-center">
                <h5 class="mb-0">Admins</h5>
                <p class="text-primary mb-0">{{ $admin }}</p>
            </div>
            <div class="text-center">
                <h5 class="mb-0">Writers</h5>
                <p class="text-primary mb-0">{{ $writer }}</p>
            </div>
            <div class="text-center">
                <h5 class="mb-0">Colabs</h5>
                <p class="text-primary mb-0">{{ $colab }}</p>
            </div>
            <div class="text-center">
                <h5 class="mb-0">Guests</h5>
                <p class="text-primary mb-0">{{ $guest }}</p>
            </div>

        </div>
        <div class="user-list">
            <div>
                <h2>Users List</h2>
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by name, email, role, or tel">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tel</th>
                            <th>Admin</th>
                            <th>Writer</th>
                            <th>Colab</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if ($user->email != "chukwumajunior12345@gmail.com" )
                                <tr id="user{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_role }}</td>
                                    <td>{{$user->tel }}</td>
                                    <td>
                                        @if($user->user_role != 'admin')
                                            <form method="POST" action="{{ route('admin.addAdmin', $user->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Make Admin</button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{ route('admin.revokeAdmin', $user->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Revoke Admin</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->user_role != 'writer')
                                            <form method="POST" action="{{ route('admin.addWriter', $user->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-dark">Make Writer</button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{ route('admin.revokeWriter', $user->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">Revoke Writer</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->user_role != 'colab')
                                            <form method="POST" action="{{ route('admin.addColab', $user->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-dark">Make Colab</button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{ route('admin.revokeColab', $user->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">Revoke Colab</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete User</button>
                                        </form>
                                    </td>
                                </tr> 
                            @endif  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <H2>Add User</H2>
        <form method="POST" action="{{ route('admin.addUser') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="user_role">Role:</label>
                <select id="user_role" name="user_role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="writer">Writer</option>
                    <option value="colab">Colab</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tel">Tel:</label>
                <input type="tel" id="tel" name="tel" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Voltafrik &copy; 2023</span>
        </div>
      </footer>

      <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const filterCounter = document.getElementById('filterCounter');
    
            searchInput.addEventListener('input', function () {
                const searchText = this.value.trim().toLowerCase();
                const rows = document.querySelectorAll('tbody tr');
                let filteredCount = 0; // Initialize counter for filtered rows
    
                rows.forEach(row => {
                    const nameCell = row.querySelector('td:nth-child(2)');
                    const emailCell = row.querySelector('td:nth-child(3)');
                    const roleCell = row.querySelector('td:nth-child(4)');
                    const telCell = row.querySelector('td:nth-child(5)');
                    const name = nameCell.textContent.toLowerCase();
                    const email = emailCell.textContent.toLowerCase();
                    const role = roleCell.textContent.toLowerCase();
                    const tel = telCell.textContent.toLowerCase();
                    const highlightedName = name.replace(new RegExp(searchText, 'gi'), match => `<span class="highlight">${match}</span>`);
                    nameCell.innerHTML = highlightedName;
    
                    if (name.includes(searchText) || email.includes(searchText) || role.includes(searchText) || tel.includes(searchText)) {
                        row.style.display = '';
                        filteredCount++; // Increment counter for filtered rows
                    } else {
                        row.style.display = 'none';
                    }
                });
    
                // Update filter counter
                filterCounter.textContent = filteredCount;
            });
    
            // Scroll to selected user position
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const userId = urlParams.get('userId');
            if (userId) {
                const userElement = document.getElementById('user' + userId);
                if (userElement) {
                    userElement.scrollIntoView();
                }
            }
        });
    </script>
    
    
</body>
</html>
