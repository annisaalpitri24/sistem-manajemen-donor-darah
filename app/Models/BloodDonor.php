<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'blood_type',
        'birth_date',
        'gender',
        'phone',
        'email',
        'address',
        'last_donation_date',
        'total_donations',
        'is_active'
    ];
    public function donations()
    {
        return $this->hasMany(DonationRecord::class, 'donor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}