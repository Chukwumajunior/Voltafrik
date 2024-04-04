<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Hash;
use App\Models\Post; // Import the Post model
use Illuminate\Support\Facades\Session;

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




    /* admin function */

    public function admin()
    {
        if (Auth::User()->user_role == 'admin'){
            $users = User::all();
  
            return view('admin', [
                'users' => $users,
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
        if (Auth::User()->user_role == 'writer' || Auth::User()->user_role == 'admin') {
            $posts = BlogPost::all(); //fetch all blog posts from
            
            return view('writer', [
                'posts' => $posts,
            ]); //returns the view with the post
        }
        else
            Session::flash('alert', 'You do not have permission to access this page.');
            return redirect()->back();
    }

}
