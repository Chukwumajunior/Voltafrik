
<section class="space-y-6">
    <div class="card">
        <div class="card-body">
            <h2>Delete Account</h2>
            <p>Please note that deleting your account does not automatically erase your posts from our database. Please do well to delete your posts if you do not want them to remain with us. Thank you.</p>
            <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete User</button>
            </form>           
        </div>
    </div>
</section>

