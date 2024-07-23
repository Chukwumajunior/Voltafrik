<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}: Visitors</title>
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
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.writer') }}">Manage Blog</a>
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
    <div class="container mt-5">
        <h1 class="text-primary text-center">Website Visitors</h1>
        <form action="{{ route('visitors.reset') }}" method="POST" class="text-center mb-3">
            @csrf
            <button type="submit" class="btn btn-danger">Reset Visitor Data</button>
        </form>
        
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="ipFilter" class="form-control" placeholder="Filter by IP">
            </div>
            <div class="col-md-4">
                <input type="text" id="agentFilter" class="form-control" placeholder="Filter by User Agent">
            </div>
            <div class="col-md-4">
                <input type="text" id="timeFilter" class="form-control" placeholder="Filter by Time">
            </div>
        </div>

        <div class="mb-3 text-center">
            <span>Total Visitors: <span id="totalVisitors">0</span></span>
            <span class="ml-3">Filtered Visitors: <span id="visibleVisitors">0</span></span>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>IP Address</th>
                    <th>User Agent</th>
                    <th>Visited At</th>
                </tr>
            </thead>
            <tbody id="visitorTable">
                @foreach($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->ip_address }}</td>
                    <td>{{ $visitor->user_agent }}</td>
                    <td>{{ $visitor->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        {{-- <div class="d-flex justify-content-center">
            {{ $visitors->links() }}
        </div> --}}
    </div>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Voltafrik &copy; 2023</span>
        </div>
      </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ipFilter = document.getElementById('ipFilter');
            const agentFilter = document.getElementById('agentFilter');
            const timeFilter = document.getElementById('timeFilter');
            const table = document.getElementById('visitorTable');
            const rows = table.getElementsByTagName('tr');
            const totalVisitors = document.getElementById('totalVisitors');
            const visibleVisitors = document.getElementById('visibleVisitors');
            
            const updateCounts = () => {
                let visibleCount = 0;
                for (let i = 0; i < rows.length; i++) {
                    if (rows[i].style.display !== 'none') {
                        visibleCount++;
                    }
                }
                totalVisitors.textContent = rows.length;
                visibleVisitors.textContent = visibleCount;
            };
            
            const filterTable = () => {
                const ipValue = ipFilter.value.toLowerCase();
                const agentValue = agentFilter.value.toLowerCase();
                const timeValue = timeFilter.value.toLowerCase();
                
                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    const ipText = cells[0].textContent.toLowerCase();
                    const agentText = cells[1].textContent.toLowerCase();
                    const timeText = cells[2].textContent.toLowerCase();
                    
                    const ipMatch = ipText.includes(ipValue);
                    const agentMatch = agentText.includes(agentValue);
                    const timeMatch = timeText.includes(timeValue);
                    
                    if (ipMatch && agentMatch && timeMatch) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
                updateCounts();
            };
            
            ipFilter.addEventListener('input', filterTable);
            agentFilter.addEventListener('input', filterTable);
            timeFilter.addEventListener('input', filterTable);

            // Initialize counts on page load
            updateCounts();
        });
    </script>
</body>
</html>
