<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\BlogPost;

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

// Static pages routes
Route::get('/consultancy', function () {
    return view('consultancy');
})->name('consultancy');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/data-analysis', function () {
    return view('data-analysis');
})->name('data-analysis');

Route::get('/smart-energy', function () {
    return view('smart-energy');
})->name('smart-energy');

Route::get('/smart-house', function () {
    return view('smart-house');
})->name('smart-house');

// Route::get('/tech', function () {
//     return view('tech');
// });
Route::get('/privacy', function () {
    return view('Privacy_policy');
})->name('privacy');

Route::get('/terms', function () {
    return view('Terms_and_conditions');
})->name('terms');

Route::get('/website', function () {
    return view('website');
})->name('website');

// Blog routes
Route::get('/', [BlogPostController::class, 'home'])->name('home');

Route::get('/portfolio', [BlogPostController::class, 'portfolio'])->name('portfolio');

Route::post('/contact', [ProfileController::class, 'store_contact'])->name('contact.store');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/admin', [ProfileController::class, 'admin'])->name('admin.dashboard');
    Route::post('/profile/admin/{user}/add-admin', [ProfileController::class, 'addAdmin'])->name('admin.addAdmin');
    Route::post('/profile/admin/{user}/revoke-admin', [ProfileController::class, 'revokeAdmin'])->name('admin.revokeAdmin');
    Route::post('/profile/admin/{user}/add-writer', [ProfileController::class, 'addWriter'])->name('admin.addWriter');
    Route::post('/profile/admin/{user}/revoke-writer', [ProfileController::class, 'revokeWriter'])->name('admin.revokeWriter');
    Route::post('/profile/admin/{user}/add-colab', [ProfileController::class, 'addColab'])->name('admin.addColab');
    Route::post('/profile/admin/{user}/revoke-colab', [ProfileController::class, 'revokeColab'])->name('admin.revokeColab');
    Route::post('/profile/addUser', [ProfileController::class, 'addUser'])->name('admin.addUser');
    Route::delete('/profile/admin/{user}/deleteUser', [ProfileController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('/profile/admin/messages', [ProfileController::class, 'messages'])->name('admin.messages');
    Route::delete('/profile/admin/messages/{id}', [ProfileController::class, 'destroy_contact'])->name('contact.destroy');
    Route::get('/profile/admin/visitors', [ProfileController::class, 'visitors'])->name('admin.visitors');
    
    Route::get('/profile/admin/writer', [ProfileController::class, 'writer'])->name('admin.writer');
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.destroy');
    
    Route::get('/create-post', [BlogPostController::class, 'create'])->name('createPost');
    Route::post('create-post', [BlogPostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.destroy');
    
    Route::post('/visitors/reset', [ProfileController::class, 'visitor_reset'])->name('visitors.reset');
});

Route::get('/store_category', [BlogPostController::class, 'store_category'])->name('store.category');

require __DIR__.'/auth.php';

/* Blog routes */
Route::get('/blog.index', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');
Route::get('/stores', [BlogPostController::class, 'market'])->name('stores');
Route::get('/blog/author/{blogPost}', [BlogPostController::class, 'author'])->name('blog.author');
Route::get('/store/{blogPost}', [BlogPostController::class, 'my_store'])->name('store.show');
Route::get('/blogger/{blogPost}', [BlogPostController::class, 'my_posts'])->name('blogger.posts');
Route::get('/blogger.index', [BlogPostController::class, 'user_posts'])->name('blogger.index');
