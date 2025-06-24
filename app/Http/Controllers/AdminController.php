<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VisaApplication;
use App\Models\VisaPayment;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalAgents = User::where('role', 'agent')->count();
        $totalApplications = VisaApplication::count();
        $pendingApplications = VisaApplication::where('status', 'pending')->count();
        $completedApplications = VisaApplication::whereIn('status', ['completed', 'approved'])->count();
        $totalRevenue = VisaPayment::where('payment_status', 'paid')->sum('amount');

        $recentUsers = User::latest()->take(5)->get()->map(function ($item) {
            $item->activity_type = 'User Registration';
            $item->activity_date = $item->created_at;
            $item->activity_detail = $item->name . ' registered.';
            $item->activity_status = 'Active';
            $item->activity_user = $item->name;
            return $item;
        });
    
        $recentApplications = VisaApplication::with('user')->latest()->take(5)->get()->map(function ($item) {
            $item->activity_type = 'Visa Application';
            $item->activity_date = $item->created_at;
            $item->activity_detail = ($item->visa_type ?? 'Visa') . ' application received.';
            $item->activity_status = ucfirst($item->status);
            $item->activity_user = optional($item->user)->name ?? 'N/A';
            return $item;
        });
    
        $recentActivities = $recentUsers->concat($recentApplications)
            ->sortByDesc('activity_date')
            ->take(5);

        return view('admin.Admin_Dashboard', compact(
            'totalUsers',
            'totalAgents',
            'totalApplications',
            'pendingApplications',
            'completedApplications',
            'totalRevenue',
            'recentActivities'
        ));
    }

    public function showUsers()
    {
        $users = User::where('role', 'user')->latest()->paginate(15);
        return view('admin.Admiin_user', compact('users'));
    }

    public function showContacts()
    {
        $contacts = \App\Models\Contact::latest()->paginate(10);
        $totalInquiries = \App\Models\Contact::count();
        // Assuming you add a 'status' column to your contacts table
        $pendingInquiries = \App\Models\Contact::where('status', 'pending')->count();
        $completedInquiries = \App\Models\Contact::where('status', 'completed')->count();

        return view('admin.user_contact', compact(
            'contacts',
            'totalInquiries',
            'pendingInquiries',
            'completedInquiries'
        ));
    }

    public function showReviews()
    {
        $reviews = \App\Models\Review::latest()->paginate(10);
        $totalReviews = \App\Models\Review::count();
        $averageRating = \App\Models\Review::avg('rating');
        // Add a 'status' column to reviews to track published/pending
        $publishedReviews = \App\Models\Review::where('status', 'published')->count();
        $pendingReviews = \App\Models\Review::where('status', 'pending')->count();

        return view('admin.user_review', compact(
            'reviews',
            'totalReviews',
            'averageRating',
            'publishedReviews',
            'pendingReviews'
        ));
    }
} 