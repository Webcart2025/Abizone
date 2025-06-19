<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaApplication extends Model
{
    use HasFactory;

    protected $table = 'visa_applications';

    protected $fillable = [

        'user_id',
        'application_id',
        'first_name',
        'middle_name',
        'last_name',
        'nationality',
        'passport_number',
        'birth_date',
        'gender',
        'marital_status',
        'passport_issue_date',
        'passport_expiry_date',
        'pan_card_number',
        'address',
        'phone_number',
        'email',
        'landmark',
        'country',
        'state',
        'city',
        'pincode',
        'passport_first_page',
        'passport_last_page',
        'photo',
        'pan_card',
        'return_ticket',
        'hotel_details',
        'status'
    ];

    protected $casts = [
        'travel_date' => 'date',
        'price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
