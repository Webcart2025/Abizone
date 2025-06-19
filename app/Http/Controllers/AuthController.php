<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logins(){
        return view('welcome');//add new index page
    }
    // public function admin(){
    //     return view('Admin');
    // }
    public function profile(){
        $user = Auth::user();
        $visaApplication = \App\Models\VisaApplication::where('id', $user->id)->first();
        return view('Profile', compact('user', 'visaApplication'));
    }
    public function login(){
        return view('Login');
    }
    public function loginPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt($credentials, $request->has('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(route('logins'));
            }

            return redirect()->back()->with('error', 'Invalid email or password');
            
        } catch (\Exception $e) {
            \Log::error('Login error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Login failed: ' . $e->getMessage());
        }
    }
    public function register(){
        return view('SignUp');
    }
    public function registerPost(Request $request)
    {
        try {
            // Basic validation
            $request->validate([
                'name' => 'required',
                'mobilenumber' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            // Check if email already exists
            if(User::where('email', $request->email)->exists()) {
                return redirect()->back()->with('error', 'Email already exists');
            }

            // Create new user
            $user = new User();
            $user->name = $request->name;
            $user->mobilenumber = $request->mobilenumber;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            
            if($user->save()) {
                return redirect()->route('logins')->with('success', 'Registration successful! Please login.');
            }
            
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
            
        } catch (\Exception $e) {
            \Log::error('Registration error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }
    // app/Http/Controllers/AccountController.php

public function delete(Request $request)
{
    $user = $request->user();
    $user->delete();
    Auth::logout();
    return redirect('/')->with('status', 'Account deleted successfully.');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('logins');
}

}