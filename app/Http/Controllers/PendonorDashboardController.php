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

        $donations = $donor->donations()
            ->latest('donation_date')
            ->get();

        $totalDonasi = $donations->count();

        $lastDonation = $donations->first()
            ? $donations->first()->donation_date
            : '-';

        $nextDonation = $lastDonation != '-'
            ? Carbon::parse($lastDonation)
            ->addDays(60)
            ->format('Y-m-d')
            : '-';

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

        $lastDonation = $donor->donations()
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
