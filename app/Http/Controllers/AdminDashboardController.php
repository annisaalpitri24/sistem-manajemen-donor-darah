<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use App\Models\DonationRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $stokA_plus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'A+');
            })->count();

        $stokA_minus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'A-');
            })->count();

        $stokB_plus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'B+');
            })->count();

        $stokB_minus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'B-');
            })->count();

        $stokO_plus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'O+');
            })->count();

        $stokO_minus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'O-');
            })->count();

        $stokAB_plus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'AB+');
            })->count();

        $stokAB_minus = DonationRecord::where('status', 'diterima')
            ->whereHas('donor', function ($q) {
                $q->where('blood_type', 'AB-');
            })->count();

        return view('admin.dashboard', compact(
            'totalDonor',
            'totalDonasi',
            'donorAktif',
            'totalUser',
            'totalAdmin',
            'totalPetugas',
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

    public function profile()
    {
        return view('admin.profile');
    }
}
