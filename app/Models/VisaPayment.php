<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'visa_application_id',
        'visa_type',
        'amount',
        'duration_days',
        'travel_date',
        'payment_status',
        'transaction_id'
    ];

    protected $casts = [
        'travel_date' => 'date',
        'amount' => 'decimal:2'
    ];

    public function visaApplication()
    {
        return $this->belongsTo(VisaApplication::class);
    }
} 