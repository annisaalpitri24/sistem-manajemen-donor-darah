<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use App\Models\DonationRecord;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalDonor = BloodDonor::count();

        $totalDonasi = DonationRecord::count();

        $donorAktif = BloodDonor::where('is_active', 1)->count();

        // 🔥 TAMBAHAN USER
        $totalUser = User::count();

        $totalAdmin = User::where('role', 'admin')->count();

        $totalPetugas = User::where('role', 'petugas')->count();

        return view('admin.dashboard', compact(
            'totalDonor',
            'totalDonasi',
            'donorAktif',
            'totalUser',
            'totalAdmin',
            'totalPetugas'
        ));
    
    }
}