<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function login()
    {
        // dd('hit');
        return view('auth.login');
    }

    //
    public function saveLogin(Request $request)
    {                                                   
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); // Return your success view
        }
    
        return view('login')->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput($request->only('email'));
    }
     
    public function register(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);
    
        $user = User::create($credentials);
    
        Auth::login($user);
    
        return redirect()->route('dashboard');

    }
    public function profile()
    {
        $active_menu = 'profile';
        $user = Auth::user();
        return view('profile.profile',compact('active_menu','user'));
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Validate the request data
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update user details
        $user->phone = $request->phone;
        $user->address = $request->address;
    // dd($request->all());
        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if it exists
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
    
            // Store new image
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->image = $path;
        }
    
        $user->save();
    
        return redirect()->route('profile.profile')->with('success', 'Profile updated successfully!');
    }
    public function logout()
{
    Auth::logout(); // Log out the user
    return redirect('/'); // Redirect to home or login page
}
}
