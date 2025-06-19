<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function adminLoginForm()
    {
        return view('Admin');
    }
    public function adminlogins(){
        return view('Admin_Dashboard');
    }

    public function adminPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|password'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.post'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('Admin');
    }
}

