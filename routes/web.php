<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\VisaApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Welcome', function () {
    return view('welcome');
});
// Route::middleware("auth")->group(function () {
//     Route::view("/",'welcome')->name('welcome');
// });

// Route::view('/profile', 'user.profile')->name('UserProfile');


Route::post('logout', function () {
    Auth::logout();
    return response()->json(['redirectUrl' => '/']); // Adjust the redirect URL here
})->name('logout');

Route::get('/PrivacyPolicy', function () {
    return view('PrivacyPolicy');
});

Route::get('/CookiePolicy', function () {
    return view('CookiePolicy');
});

Route::get('/RefundPolicy', function () {
    return view('RefundPolicy');
});

Route::get('/SignUp', function () {
    return view('SignUp');
});
Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Document', function () {
    return view('Document');
});

Route::get('/Navbar', function () {
    // return view('Navbar');
    $user = Auth::user();
    
    return view('Navbar', compact('user'));
});

// Route::get('/Profile', function () {
//     return view('Profile');
// });

// Route::get('/UserProfile', function () {
//     return view('UserProfile');
// });

Route::get('/AboutUs', function () {
    return view('AboutUs');
});

Route::get('/ContactUs', function () {
    return view('ContactUs');
});

Route::get('/TotalBill', function () {
    return view('TotalBill');
});

Route::get('/Form1', function () {
    return view('Form1');
})->name('Form1');

Route::get('/Form', function () {
    return view('Form');
});


Route::get('/AgentRegistration', function () {
    return view('AgentRegistration');
});

Route::get('/AgentDashboard', function () {
    return view('Dashboard');
});
Route::get('/AgentUser', function () {
    return view('AgentUser');
});
Route::get('/a_reg', function () {
    return view('AgentVisaApplication');
});

Route::get('/Agentform', function () {
    return view('VisaApplicationFormMultipleUsers');
});

Route::get('/wallet', function () {
    return view('AgentWalletManagement');
});

Route::get('/VisaApplicationDetails', function () {
    return view('VisaApplicationDetails');
});
Route::get('/applicant', function () {
    return view('Applicant'); 
});
Route::get('/AgentProfile', function () {
    return view('AgentProfile');
});
// Route::get('/document', function () {
//     return view('document');
// });

Route::get('/admin/login', function () {
    return view('Admin');
});
Route::get('/Dashboard', function () {
    return view('Admin_Dashboard');
});

Route::get('/admin_user', function () {
    return view('Admiin_user');
});

Route::get('/admin_agent', function () {
    return view('Admin_ Agents');
});

Route::get('/AgentDetails', function () {
    return view('Admin_AgentDetails');
});
Route::get('/calender', function () {
    return view('calender'); 
});
Route::get('/Payment',function(){
    return view('Payment');
})->name('Payment');


Route::post('/submit-form1', function() {
    // Process form data if needed
    return redirect()->route('Payment');
})->name('submit.form1');
Route::get('/admin/login', [AdminAuthController::class,'adminLoginForm'])->name('admin');
Route::post('/admin', [AdminAuthController::class,'adminPost'])->name('adminpost');
Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callback']); 
Route::get('/Logins', [AuthController::class,'login'])->name('logins');
Route::get('/Login',[AuthController::class , 'logins'])->name('login');
Route::post('/Loginpost', [AuthController::class,'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/admin/login', [AdminAuthController::class,'adminLoginForm'])->name('admin');
Route::post('/adminpost', [AdminAuthController::class,'adminlogins'])->name('admin.post');
Route::get('/document', [AuthController::class,'document'])->name('document');
Route::delete('/account/delete', [AuthController::class, 'delete'])->name('account.delete');
Route::get('/profile', [ProfileController::class,'profile'])->name('profile');
Route::post('/visa-application', [VisaApplicationController::class, 'store'])->name('store.post');
Route::put('/profile/update', [ProfileController::class,'update'])->name('profile.update');
// Route::get('/agent/visa-users', [AgentController::class, 'showUsers'])->name('agent.visaUsers');
// Route::get('/agent/apply-visa/{user}', [AgentController::class, 'applyVisaForm'])->name('agent.applyVisaForm');

// Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/logins', [AuthController::class, 'logins'])->name('logins');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/delete-account', [AuthController::class, 'delete'])->name('delete.account');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/process-visa', [App\Http\Controllers\VisaController::class, 'process'])->name('process.visa');
});

// Visa Payment Routes
Route::post('/process-visa', [App\Http\Controllers\VisaPaymentController::class, 'process'])->name('process.visa');
Route::get('/visa/status/{id}', [App\Http\Controllers\VisaPaymentController::class, 'status'])->name('visa.status');

Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Visa application routes
    Route::get('/profile/application/{id}', [VisaApplicationController::class, 'show'])
         ->name('visa.profile');


});

    Route::post("razorpay/callback",[Controller::class,'callback'])->name('razorpay.callback');

