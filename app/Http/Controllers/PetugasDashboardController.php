<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use App\Models\DonationRecord;
use App\Models\User;

class PetugasDashboardController extends Controller
{
    public function index()
    {
        $totalDonor = User::where('role', 'pendonor')->count();

        $donorAktif = User::where('role', 'pendonor')->count();

        $totalDonasi = DonationRecord::count();

        $stokA_plus = BloodDonor::where('blood_type', 'A+')->count();
        $stokA_minus = BloodDonor::where('blood_type', 'A-')->count();

        $stokB_plus = BloodDonor::where('blood_type', 'B+')->count();
        $stokB_minus = BloodDonor::where('blood_type', 'B-')->count();

        $stokO_plus = BloodDonor::where('blood_type', 'O+')->count();
        $stokO_minus = BloodDonor::where('blood_type', 'O-')->count();

        $stokAB_plus = BloodDonor::where('blood_type', 'AB+')->count();
        $stokAB_minus = BloodDonor::where('blood_type', 'AB-')->count();



        return view('petugas.dashboard', compact(
            'totalDonor',
            'donorAktif',
            'totalDonasi',
            'stokA_plus',
            'stokA_minus',
            'stokB_plus',
            'stokB_minus',
            'stokO_plus',
            'stokO_minus',
            'stokAB_plus',
            'stokAB_minus'
        ));
    }
}
