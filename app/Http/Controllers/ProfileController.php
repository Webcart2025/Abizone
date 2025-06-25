<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VisaApplication;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        
        // Get the most recent visa application for this user
        $visaApplication = VisaApplication::where('user_id', $user->id)
                                        ->latest()
                                        ->first();
        
        return view('user.Profile', compact('user', 'visaApplication'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobilenumber' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobilenumber = $request->mobilenumber;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function index()
    {
        $user = Auth::user();
        $visaApplication = \App\Models\VisaApplication::where('user_id', $user->id)
            ->latest()
            ->first();
        return view('user.Profile', compact('user', 'visaApplication'));
    }
}