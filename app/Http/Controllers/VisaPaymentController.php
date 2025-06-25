<?php

namespace App\Http\Controllers;

use App\Models\VisaApplication;
use App\Models\VisaPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisaPaymentController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'selected_date' => 'required|date|after:today',
            'visa_type' => 'required|string',
            'price' => 'required|numeric',
            'days' => 'required|integer'
        ]);

        try {
            DB::beginTransaction();

            // Create visa application
            $visaApplication = VisaApplication::create([
                'user_id' => auth()->id(),
                'travel_date' => $request->selected_date,
                'visa_type' => $request->visa_type,
                'price' => $request->price,
                'duration_days' => $request->days,
                'status' => 'pending'
            ]);

            // Create payment record and mark as completed for test/demo
            $payment = VisaPayment::create([
                'visa_application_id' => $visaApplication->id,
                'visa_type' => $request->visa_type,
                'amount' => $request->price,
                'duration_days' => $request->days,
                'travel_date' => $request->selected_date,
                'payment_status' => 'completed', 
                'transaction_id' => 'TEST-' . uniqid()
            ]);

            DB::commit();

            // Redirect to profile with success message
            return redirect()->route('profile')->with('success', 'Your visa applied successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your application. Please try again.');
        }
    }

    public function status($id)
    {
        $payment = VisaPayment::with('visaApplication')
            ->where('visa_application_id', $id)
            ->firstOrFail();

        return view('visa.status', compact('payment'));
    }
} 