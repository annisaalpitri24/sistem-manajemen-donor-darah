<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use Carbon\Carbon;

class PendonorDashboardController extends Controller
{
    public function index()
    {
        $donor = BloodDonor::where(
            'user_id',
            auth()->id()
        )->first();

        if (!$donor) {
            return view('pendonor.dashboard', [
                'totalDonasi' => 0,
                'lastDonation' => '-',
                'nextDonation' => '-',
                'donations' => []
            ]);
        }

        // Semua riwayat donor
        $donations = $donor->donations()
            ->latest('donation_date')
            ->get();

        // Hanya donor yang diterima
        $acceptedDonations = $donor->donations()
            ->where('status', 'diterima')
            ->latest('donation_date')
            ->get();

        // Total donor yang diterima
        $totalDonasi = $acceptedDonations->count();

        // Donor terakhir yang diterima
        $lastAccepted = $acceptedDonations->first();

        if ($lastAccepted) {

            $lastDonation = $lastAccepted->donation_date;

            $nextDonation = Carbon::parse($lastDonation)
                ->addDays(60)
                ->format('Y-m-d');

        } else {

            $lastDonation = '-';
            $nextDonation = '-';

        }

        return view('pendonor.dashboard', compact(
            'donations',
            'totalDonasi',
            'lastDonation',
            'nextDonation'
        ));
    }

    public function profil()
    {
        return view('pendonor.profil');
    }

    public function riwayat()
    {
        $donor = BloodDonor::where(
            'user_id',
            auth()->id()
        )->first();

        if (!$donor) {
            return view('pendonor.riwayat', [
                'donations' => []
            ]);
        }

        $donations = $donor->donations()
            ->latest('donation_date')
            ->get();

        return view('pendonor.riwayat', compact('donations'));
    }

    public function jadwal()
    {
        $donor = BloodDonor::where(
            'user_id',
            auth()->id()
        )->first();

        if (!$donor) {
            return view('pendonor.jadwal', [
                'nextDonation' => '-',
                'lastDonation' => '-'
            ]);
        }

        // Hanya donor yang diterima
        $lastDonation = $donor->donations()
            ->where('status', 'diterima')
            ->latest('donation_date')
            ->first();

        if ($lastDonation) {

            $lastDate = $lastDonation->donation_date;

            $nextDonation = Carbon::parse($lastDate)
                ->addDays(60)
                ->format('Y-m-d');

        } else {

            $lastDate = '-';
            $nextDonation = '-';

        }

        return view('pendonor.jadwal', [
            'lastDonation' => $lastDate,
            'nextDonation' => $nextDonation
        ]);
    }
}