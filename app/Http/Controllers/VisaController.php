<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisaApplication;

class VisaController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'selected_date' => 'required|date|after:today',
            'visa_type' => 'required|string',
            'price' => 'required|numeric',
            'days' => 'required|integer'
        ]);

        // Create new visa application
        $visaApplication = VisaApplication::create([
            'user_id' => auth()->id(),
            'travel_date' => $request->selected_date,
            'visa_type' => $request->visa_type,
            'price' => $request->price,
            'duration_days' => $request->days,
            'status' => 'pending'
        ]);

        return redirect()->route('visa.status', ['id' => $visaApplication->id])
            ->with('success', 'Visa application submitted successfully!');
    }
} 