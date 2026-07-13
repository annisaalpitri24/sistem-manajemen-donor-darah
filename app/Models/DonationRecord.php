<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRecord extends Model
{
    protected $fillable = [
        'donor_id',
        'donation_date',
        'location',
        'amount_ml',
        'blood_pressure',
        'hemoglobin',
        'officer_name',
        'status',
        'notes'
    ];

    public function donor()
    {
        return $this->belongsTo(BloodDonor::class, 'donor_id');
    }
}