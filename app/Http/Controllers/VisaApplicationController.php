<?php

namespace App\Http\Controllers;

use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusUpdated;
use Illuminate\Support\Str;

class VisaApplicationController extends Controller
{

    public function index()
    {
        $applications = VisaApplication::with('user') // Eager load user relationship
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Paginate results
        
            return view('admin.user_application', compact('applications'));

    }

    public function store(Request $request)
    {
        // Check for duplicate passport number
        $existingApplication = VisaApplication::where('passport_number', $request->input('passport_number'))->first();
        if ($existingApplication) {
            return redirect()->back()->with('error', 'This passport number has already been used.')->withInput();
        }

        $visaApplication = new VisaApplication();
        $visaApplication->user_id = Auth::id();
        $visaApplication->application_id = $request->input('application_id') ?? time();

        $visaApplication->first_name = $request->input('first_name');
        $visaApplication->middle_name = $request->input('middle_name');
        $visaApplication->last_name = $request->input('last_name');
        $visaApplication->nationality = $request->input('nationality');
        $visaApplication->passport_number = $request->input('passport_number');
        $visaApplication->birth_date = date('Y-m-d', strtotime($request->input('birth_date')));
        $visaApplication->gender = $request->input('gender');
        $visaApplication->marital_status = $request->input('marital_status');
        $visaApplication->passport_issue_date = date('Y-m-d', strtotime($request->input('passport_issue_date')));
        $visaApplication->passport_expiry_date = date('Y-m-d', strtotime($request->input('passport_expiry_date')));
        $visaApplication->pan_card_number = $request->input('pan_card_number');
        $visaApplication->address = $request->input('address');
        $visaApplication->phone_number = $request->input('phone_number');
        $visaApplication->landmark = $request->input('landmark');
        $visaApplication->country = $request->input('country');
        $visaApplication->state = $request->input('state');
        $visaApplication->city = $request->input('city');
        $visaApplication->pincode = $request->input('pincode');

        // File uploads
        $uploadPath = public_path('uploads/visa_documents');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $fileFields = [
            'passport_first_page' => '_first',
            'passport_last_page' => '_last',
            'photo' => '_photo',
            'pan_card' => '_pan',
            'return_ticket' => '_ticket',
            'hotel_details' => '_hotel',
        ];

        foreach ($fileFields as $field => $suffix) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . $suffix . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);
                $visaApplication->$field = 'uploads/visa_documents/' . $filename;
            }
        }

        $visaApplication->save();

        // ✅ Redirect to profile using application_id
        // return redirect()->route('visa.profile', ['id' => $visaApplication->application_id]);
        return redirect()->route('Payment');
    }

    public function show($id)
    {
        $visaApplication = VisaApplication::where('user_id', Auth::id())
                                          ->where('application_id', $id)
                                          ->firstOrFail();

        $user = Auth::user();

        return view('profile', compact('visaApplication', 'user'));
    }

    public function adminUserApplications()
    {
        $applications = \App\Models\VisaApplication::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.Admiin_user', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'feedback' => 'nullable|string',
        ]);

        $application = VisaApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        // Send email to user
        if ($application->user) {
            Mail::to($application->user->email)->send(new ApplicationStatusUpdated($application, $request->feedback));
        }

        return redirect()->back()->with('success', 'Application status updated and user notified.');
    }
}