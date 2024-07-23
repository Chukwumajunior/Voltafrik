<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\BlogPost;
use App\Models\Message;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Hash;
use App\Models\Post; // Import the Post model
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\Storage\EntryQueryOptions;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    public function visitors()
    {
        // $visitors = Visitor::latest()->paginate(10);
        $visitors = Visitor::all();
        return view('visitors', compact('visitors'));
    }

    public function visitor_reset(Request $request)
    {
        // Delete all visitor records
        Visitor::truncate();

        // Redirect back to the visitors page with a success message
        return redirect()->back()->with('success', 'Visitor data reset successfully.');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

//  public function user_count() 
//     {   
//         $admin = '';
//         $writer = '';
//         $colab = '';
//         $guest = '';

//        if (Auth::User()->user_role == 'admin'){
//             $admin = count(User::all());
//        }
//        if (Auth::User()->user_role == 'writer'){
//             $writer = count(User::all());
//        }
//        if (Auth::User()->user_role == 'colab'){
//             $colab = count(User::all());
//        }
//        if (Auth::User()->user_role == 'guest'){
//             $guest = count(User::all());
//        }
//        return view('admin', [
//             'admin' => $admin,
//             'writer' => $writer,
//             'colab' => $colab,
//             'guest' => $guest,
//         ]); //returns the view with the post
       
//     }


    public function admin()
    {

        if (Auth::User()->user_role == 'admin'){
            $users = User::all();
            $admin = User::where('user_role', 'admin')->count();
            $writer = User::where('user_role', 'writer')->count();
            $colab = User::where('user_role', 'colab')->count();
            $guest = User::where('user_role', 'guest')->count();

            $fiveDaysAgo = Carbon::now()->subDays(7);
            $messages = Message::where('created_at', '>', $fiveDaysAgo)->get(); // Adjusted condition
            $count_msg = $messages->count();
 
            return view('admin', [
                'users' => $users,
                'count_msg' => $count_msg,
                'admin' => $admin,
                'writer' => $writer,
                'colab' => $colab,
                'guest' => $guest,
            ]); //returns the view with the post
        }
        else
            Session::flash('alert', 'You do not have permission to access this page.');
            return redirect()->back();
    }

    public function addAdmin(User $user)
    {
        $user->user_role = 'admin';
        $user->save();
        return redirect()->back()->with('success', 'User role updated to admin');
    }

    public function revokeAdmin(User $user)
    {
        $user->user_role = 'guest';
        $user->save();
        return redirect()->back()->with('success', 'Admin role revoked');
    }

    public function addWriter(User $user)
    {
        $user->user_role = 'writer';
        $user->save();
        return redirect()->back()->with('success', 'User role updated to admin');
    }

    public function revokeWriter(User $user)
    {
        $user->user_role = 'guest';
        $user->save();
        return redirect()->back()->with('success', 'Writer role revoked');
    }

    public function addColab(User $user)
    {
        $user->user_role = 'colab';
        $user->save();
        return redirect()->back()->with('success', 'User role updated to colab');
    }

    public function revokeColab(User $user)
    {
        $user->user_role = 'guest';
        $user->save();
        return redirect()->back()->with('success', 'Colab role revoked');
    }

    public function addUser(Request $request)
    {
      
        $user = User::create([
            'name' => $request->name,
            'user_role' => $request->user_role,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User added successfully.');
    }

    public function deleteUser(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User account deleted successfully.');
    }
    
    public function writer()
    {
        if ((Auth::user()->user_role == 'admin') || (Auth::user()->user_role == 'writer')) {
            $posts = BlogPost::all(); // fetch all blog posts
            $postCategories = ['Fashion', 'Socials', 'Vehicles', 'Solar inverter', 'Tech news', 'Smart gadgets', 'Web project', 'Data project', 'Smart house project', 'Advert'];
            $postTypes = ['Information', 'Market', 'Portfolio', 'Wall video', 'Wall Image1', 'Wall image2', 'Advert', 'Executives'];
    
            return view('writer', [
                'posts' => $posts,
                'postTypes' => $postTypes,
                'postCategories' => $postCategories,
            ]); // return the view with the posts, post types, and post categories
        } else {
            Session::flash('alert', 'You do not have permission to access this page.');
            return redirect()->back();
        }
    }

    

    public function store_contact(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Create a new message instance and store it in the database
        $message = Message::create($validatedData);

        Session::flash('success_message', 'We got your Message! Please check your email for our feedback later');

        // Redirect back to the home page with a success message
        return redirect('/')->with('success', 'Your message has been submitted successfully!');
    }

    public function destroy_contact($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
    
        return redirect('/profile/admin/messages');
    }
    


    public function messages()
    {
        $messages = Message::latest()->get();
        return view('messages', compact('messages'));
    }

}
