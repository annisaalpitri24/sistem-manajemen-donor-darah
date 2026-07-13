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

        $donorAktif = User::where('role', 'pendonor')
            ->where('status', 'approved')
            ->count();

        $totalDonasi = DonationRecord::where('status', 'diterima')->count();

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
    public function profile()
    {
        return view('petugas.profile');
    }
}
