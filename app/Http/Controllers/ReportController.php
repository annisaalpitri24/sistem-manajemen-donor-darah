<?php

namespace App\Http\Controllers;

use App\Models\DonationRecord;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type ?? 'harian';

        $query = DonationRecord::with('donor');

        if ($request->filled('tanggal')) {

            if ($type == 'harian') {

                $query->whereDate('donation_date', $request->tanggal);
            } elseif ($type == 'bulanan') {

                $tanggal = Carbon::parse($request->tanggal);

                $query->whereMonth('donation_date', $tanggal->month)
                    ->whereYear('donation_date', $tanggal->year);
            } elseif ($type == 'tahunan') {

                $tanggal = Carbon::parse($request->tanggal);

                $query->whereYear('donation_date', $tanggal->year);
            }
        }

        $donations = $query->latest()->get();

        return view('reports.index', compact(
            'donations',
            'type'
        ));
    }

    public function pdf(Request $request)
    {
        $type = $request->type ?? 'harian';

        $query = DonationRecord::with('donor');

        if ($request->filled('tanggal')) {

            if ($type == 'harian') {

                $query->whereDate('donation_date', $request->tanggal);
            } elseif ($type == 'bulanan') {

                $tanggal = Carbon::parse($request->tanggal);

                $query->whereMonth('donation_date', $tanggal->month)
                    ->whereYear('donation_date', $tanggal->year);
            } elseif ($type == 'tahunan') {

                $tanggal = Carbon::parse($request->tanggal);

                $query->whereYear('donation_date', $tanggal->year);
            }
        }

        $donations = $query->latest()->get();

        $pdf = Pdf::loadView('reports.pdf', compact(
            'donations',
            'type'
        ));

        return $pdf->stream('laporan_donor.pdf');
    }
}
