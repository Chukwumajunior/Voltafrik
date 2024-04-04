<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/consultancy', function () {
    return view('consultancy');
});
Route::get('/data-analysis', function () {
    return view('data-analysis');
});
Route::get('/smart-energy', function () {
    return view('smart-energy');
});
Route::get('/smart-house', function () {
    return view('smart-house');
});

// Route::get('/tech', function () {
//     return view('tech');
// });
Route::get('/privacy', function () {
    return view('Privacy_policy');
});
Route::get('/terms', function () {
    return view('Terms_and_conditions');
});
Route::get('/website', function () {
    return view('website');
});


Route::get('/', [BlogPostController::class, 'home']);

Route::get('/portfolio', [BlogPostController::class, 'portfolio']);

Route::post('/contact', 'ContactController@store')->name('contact.store');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/admin',  [ProfileController::class, 'admin']);
    Route::post('/profile/admin/{user}/add-admin', [ProfileController::class, 'addAdmin'])->name('admin.addAdmin');
    Route::post('/profile/admin/{user}/revoke-admin', [ProfileController::class, 'revokeAdmin'])->name('admin.revokeAdmin');
    Route::post('/profile/admin/{user}/add-writer', [ProfileController::class, 'addWriter'])->name('admin.addWriter');
    Route::post('/profile/admin/{user}/revoke-writer', [ProfileController::class, 'revokeWriter'])->name('admin.revokeWriter');
    Route::post('/profile/admin/{user}/add-colab', [ProfileController::class, 'addColab'])->name('admin.addColab');
    Route::post('/profile/admin/{user}/revoke-colab', [ProfileController::class, 'revokeColab'])->name('admin.revokeColab');
    Route::post('/profile/addUser', [ProfileController::class, 'addUser'])->name('admin.addUser');
    Route::delete('/profile/admin/{user}/deleteUser', [ProfileController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('/profile/writer',  [ProfileController::class, 'writer']);
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']);

});

require __DIR__.'/auth.php';


/*blog routes*/

Route::get('/blog',  [BlogPostController::class, 'index']);
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show']);
Route::get('/stores', [BlogPostController::class, 'market']);
Route::get('/blog/author/{blogPost}', [BlogPostController::class, 'author']);

Route::middleware('blogPosts')->group(function () {
    Route::get('/blog/create/post', [BlogPostController::class, 'create']);
    Route::post('/blog/create/post', [BlogPostController::class, 'store']);
    Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']);
    Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update']);
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']);
    Route::get('/my_posts', [BlogPostController::class, 'my_posts']);
    Route::get('/store/{blogPost}', [BlogPostController::class, 'my_store']);
    Route::get('/store_category', [BlogPostController::class, 'store_category']);

});


// Route::get('/blog/create/post', [BlogPostController::class, 'create']); //shows create post form
// Route::post('/blog/create/post', [BlogPostController::class, 'store']); //saves the created post to the databse
// Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']); //shows edit post form
// Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update']); //commits edited post to the database 
// Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']); //deletes post from the database
// Route::get('/my_posts', [BlogPostController::class, 'my_posts']);

