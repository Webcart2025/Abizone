<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function logins(){
        return view('user.Login'); // add new index page
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
        return view('user.Login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        Log::info('Login attempt', ['email' => $request->email]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            Log::info('User authenticated', [
                'id' => $user->id,
                'email' => $user->email,
                'password'=>$user->password,
                'role' => $user->role
            ]);

            if ($user->isAdmin()) {
                Log::info('Redirecting admin to dashboard');
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        Log::warning('Failed login attempt', ['email' => $request->email]);
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->onlyInput('email');
    }
    public function register(){
        return view('user.SignUp');
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
 protected function authenticated(Request $request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('/');
}

public function testPayment($id)
{
    $payment = \App\Models\VisaPayment::findOrFail($id);
    $payment->payment_status = 'completed';
    $payment->transaction_id = 'TEST-' . uniqid();
    $payment->save();

    return back()->with('success', 'Test payment marked as completed!');
}

}