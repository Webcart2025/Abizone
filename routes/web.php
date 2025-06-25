<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\VisaApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/Welcome', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/FAQs', function () {
    return view('user.FAQs');
});

Route::get('/TermsandConditions', function () {
    return view('user.Termsandconditions');
});

Route::get('/contactus', function () {
    return view('user.Contactus');
})->name('Contactus');

Route::get('/PrivacyPolicy', function () {
    return view('user.PrivacyPolicy');
}); 

Route::get('/CookiePolicy', function () {
    return view('user.CookiePolicy');
});

Route::get('/RefundPolicy', function () {
    return view('user.RefundPolicy');
});

Route::get('/SignUp', function () {
    return view('user.SignUp');
})->name('logins');

Route::get('/login', [AuthController::class, 'login'])->name('login');


Route::get('/Document', function () {
    return view('Document');
});

Route::get('/Navbar', function () {
    $user = Auth::user();
    return view('user.Navbar', compact('user'));
});

Route::get('/AboutUs', function () {
    return view('user.About');
})->name('AboutUs');

Route::get('/ContactUs', function () {
    return view('user.ContactUs');
});

Route::get('/TotalBill', function () {
    return view('user.TotalBill');
});

Route::get('/Form1', function () {
    return view('user.Form1');
})->name('Form1');

Route::get('/Form', function () {
    return view('Form');
});

Route::get('/calender', function () {
    return view('user.calender'); 
});

Route::get('/Payment',function(){
    return view('user.Payment');
})->name('Payment');

Route::post('/submit-form1', function() {
    return redirect()->route('Payment');
})->name('submit.form1');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Authentication Routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/LoginPost', [AuthController::class, 'loginPost'])->name('login.post');

// Google Auth Routes
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callback']); 

// Agent Routes
Route::get('/AgentRegistration', function () {
    return view('agent.AgentRegistration');
});

Route::get('/AgentDashboard', function () {
    return view('agent.Dashboard');
});

Route::get('/AgentUser', function () {
    return view('agent.AgentUser');
});

Route::get('/a_reg', function () {
    return view('agent.AgentVisaApplication');
});

Route::get('/Agentform', function () {
    return view('agent.VisaApplicationFormMultipleUsers');
});

Route::get('/wallet', function () {
    return view('agent.AgentWalletManagement');
});

Route::get('/VisaApplicationDetails', function () {
    return view('agent.VisaApplicationDetails');
});

Route::get('/applicant', function () {
    return view('agent.Applicant'); 
});

Route::get('/AgentProfile', function () {
    return view('agent.AgentProfile');
});

// Protected Routes (Require Authentication)
Route::middleware(['auth'])->group(function () {
    // Common authenticated routes
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/account/delete', [AuthController::class, 'delete'])->name('account.delete');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Visa application routes
    Route::post('/visa-application', [VisaApplicationController::class, 'store'])->name('store.post');
    Route::get('/profile/application/{id}', [VisaApplicationController::class, 'show'])->name('visa.profile');
    
    // User dashboard
    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::post('/admin/applications/{id}/status', [VisaApplicationController::class, 'updateStatus'])->name('admin.applications.updateStatus');

    // Payment routes
    Route::post('/process-visa', [App\Http\Controllers\VisaPaymentController::class, 'process'])->name('process.visa');
    Route::get('/visa/status/{id}', [App\Http\Controllers\VisaPaymentController::class, 'status'])->name('visa.status');
    Route::post("razorpay/callback", [Controller::class, 'callback'])->name('razorpay.callback');

    // Admin Routes (Require both auth and admin role)
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });

     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


    Route::get('/applications', [VisaApplicationController::class, 'index'])->name('admin.applications');


    // User routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    });
        
    Route::get('/contacts', [AdminController::class, 'showContacts'])->name('admin.contacts');
        
        Route::get('/transactions', function () {
            return view('admin.user_transaction');
        })->name('admin.transactions');
        
        Route::get('/reviews', [AdminController::class, 'showReviews'])->name('admin.reviews');
        
        Route::get('/agents', function () {
            return view('admin.Admin_ Agents');
        })->name('admin.agents');
        
        Route::get('/agent-details', function () {
            return view('admin.Admin_AgentDetails');
        })->name('admin.agent-details');

        // Route::get('/Dashboard', function () {
        //     return view('admin.Admin_ Dashboard');
        // })->name('Dashboard');

        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/payment/{id}/test', [VisaPaymentController::class, 'testPayment'])->name('payment.test');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
       
    });