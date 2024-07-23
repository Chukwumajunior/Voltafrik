@extends('layout.blog_app')
@section('content')

<section class="py-5" style="background-color: #d6d1d1;">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center pt-4">
                <h1>Writer Panel</h1>
                <span>Total Posts: <span id="totalPosts">0</span></span> || 
                <span>Filtered Posts: <span id="filteredPosts">0</span></span>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Search posts...">
            </div>
            <div class="col-md-4">
                <select id="postType" class="form-control">
                    <option value="">Select Post Type</option>
                    @foreach ($postTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select id="postCategory" class="form-control">
                    <option value="">Select Post Category</option>
                    @foreach ($postCategories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($posts as $post)
                            <tr id="post{{ $post->user_id }}" data-type="{{ $post->type }}" data-category="{{ $post->category }}">
                                <td>{{ $post->user_id }}</td>
                                <td><a href="{{ url('blog', $post->id) }}">{{ $post->title }}</a></td>
                                <td>
                                    <form method="POST" action="{{ url('blog', $post->id) }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
    const postTypeSelect = document.getElementById('postType');
    const postCategorySelect = document.getElementById('postCategory');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');
    const totalPostsDisplay = document.getElementById('totalPosts');
    const filteredPostsDisplay = document.getElementById('filteredPosts');

    function filterRows() {
        const searchText = searchInput.value.toLowerCase();
        const selectedType = postTypeSelect.value.toLowerCase();
        const selectedCategory = postCategorySelect.value.toLowerCase();
        
        let totalPosts = 0;
        let filteredPosts = 0;
        
        Array.from(rows).forEach(row => {
            const authorCell = row.getElementsByTagName('td')[0];
            const titleCell = row.getElementsByTagName('td')[1];
            const type = row.getAttribute('data-type').toLowerCase();
            const category = row.getAttribute('data-category').toLowerCase();
            
            const authorText = authorCell.textContent.toLowerCase();
            const titleText = titleCell.textContent.toLowerCase();

            const textMatches = searchText === '' || authorText.includes(searchText) || titleText.includes(searchText);
            const typeMatches = selectedType === '' || type === selectedType;
            const categoryMatches = selectedCategory === '' || category === selectedCategory;

            const showRow = textMatches && typeMatches && categoryMatches;
            row.style.display = showRow ? '' : 'none';

            totalPosts++; // Increment total posts count
            if (showRow) {
                filteredPosts++; // Increment filtered posts count if the row is visible
            }
        });

        totalPostsDisplay.textContent = totalPosts;
        filteredPostsDisplay.textContent = filteredPosts;
    }

    searchInput.addEventListener('keyup', filterRows);
    postTypeSelect.addEventListener('change', filterRows);
    postCategorySelect.addEventListener('change', filterRows);

    // Initial calculation on page load
    filterRows();
});

</script>


@endsection
