<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
}
