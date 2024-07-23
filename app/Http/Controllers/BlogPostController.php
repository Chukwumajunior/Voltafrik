<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Hash;
use App\Models\Post; // Import the Post model
use Ramsey\Uuid\Type\Integer;

class BlogPostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::all(); //fetch all blog posts from 

        $user_names = User::all('name');

        // $posts2 = BlogPost::orderBy('created_at', 'desc')->take(4)->get();

        $authors = $posts->pluck('user_id')->unique();
        
            
        $posts_sum = count($posts);

        $myPost_sum = 0;

        if (Auth::user()) {
            foreach ($posts as $post) {
                if ($post->user_id == Auth::user()->name) {
                    $myPost_sum++;
                }
            }
        }
            
	    return view('blog.blog', [
            'posts' => $posts,
            'authors' => $authors,
            'posts_sum' => $posts_sum,
            'myPost_sum' =>  $myPost_sum
        ]); //returns the view with posts
    }

    public function home()
    {
        $posts = BlogPost::all();
        $advert_posts = BlogPost::where('type', 'Advert')->inRandomOrder()->take(4)->get();
        
        return view('index', [
            'posts' => $posts,
            'advert_posts' => $advert_posts,
        ]); //returns the view with the post
    
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $imageName = "";

        if ($request->hasFile('image')) {
            /**
             * @var UploadedFile $john
             */

            $image = $request->image;
        
            $imageName = time().'.'.$image->extension();

            // $image->move(public_path('uploads'), $imageName); 

            $image->move('uploads', $imageName);

        } 

        $price = $request->price;

        if ($request->price == '') {
            $price = "N/A";
        }
          

        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imageName,
            'user_id' => Auth::user()->name,
            'category' => $request->category,
            'type' => $request->type,
            'price' => $price
        ]);

        return redirect('blog/' . $newPost->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
          // show all blog posts
          $posts = BlogPost::all(); //fetch all blog posts from DB

          return view('blog.show', [
              'post' => $blogPost,
              'posts' => $posts,
          ]); //returns the view with the post
    }

    
    /**
     * Display the specified resource.
     */
    // public function my_posts()
    // {
    //     $posts = BlogPost::all(); //fetch all blog posts from ;

    //     return view('blog.my_posts', [
    //         'posts' => $posts,
    //     ]); //returns the view with the post
    // }


    public function my_posts(blogPost $blogPost)
    {
        $user_id = $blogPost->user_id;
        
        $posts = BlogPost::where('user_id', $user_id)->get(); // Fetch posts that match the user_id
        
        return view('blog.my_posts', [
            'posts' => $posts
        ]); // Return the view with the matching posts
    }

    public function user_posts()
    {
        // Get the authenticated user's ID
        $user_id = Auth::user()->name;
    
        // Fetch all blog posts associated with the authenticated user's user_id
        $posts = BlogPost::where('user_id', $user_id)->get();
    
        return view('blog.my_posts', [
            'posts' => $posts
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', [
            'post' => $blogPost,
        ]); //returns the view with the post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {

        if ($request->hasFile('image')) {
            
            $image = $request->image;
        
            $imageName = time().'.'.$image->extension();

            // $image->move(public_path('uploads'), $imageName);
            $image->move('uploads', $imageName);

            $blogPost->update(['image' => $imageName ]);
        }

        $price = $request->price;

        if ($request->price == '') {
            $price = "N/A";
        }

        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body,
            'category' => $request->category,
            'type' => $request->type,
            'price' => $price
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
    
        return redirect('blog.index');
    }
    

    public function market()
    {
        $posts = BlogPost::with('user')->get();

        $users = User::all();

        return view('stores', [
            'posts' => $posts,
            'users' => $users,
        ]); //returns the view with the post
    }

    public function portfolio()
    {
        $posts = BlogPost::all();

        return view('blog.portfolio', [
            'posts' => $posts,
        ]); //returns the view with the post
    }

    public function my_store(BlogPost $blogPost)
    {
        $users = User::all();

        $posts = BlogPost::all();
        
        return view('blog.my_store', [
            'blogPost' => $blogPost,
            'users' => $users,
            'posts' => $posts,
        ]); //returns the view with the post

    }

}

