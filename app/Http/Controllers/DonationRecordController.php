<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use App\Models\DonationRecord;
use Illuminate\Http\Request;

class DonationRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $donations = DonationRecord::with('donor')
            ->when($search, function ($query, $search) {
                $query->whereHas('donor', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
           })->paginate(10);


        return view('donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $donors = BloodDonor::all();

        return view('donations.create', compact('donors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'donor_id' => 'required',
            'donation_date' => 'required|date',
            'status' => 'required|in:diterima,ditolak',
        ]);

        DonationRecord::create($request->all());

        // Tambah riwayat donor hanya jika diterima
        if ($request->status == 'diterima') {

            $donor = BloodDonor::findOrFail($request->donor_id);

            $donor->total_donations += 1;
            $donor->last_donation_date = $request->donation_date;
            $donor->save();
        }

        return redirect()
            ->route('donations.index')
            ->with('success', 'Data donor berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $donation = DonationRecord::findOrFail($id);
        $donors = BloodDonor::all();

        return view('donations.edit', compact('donation', 'donors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $donation = DonationRecord::findOrFail($id);

        $donation->update($request->all());

        return redirect()->route('donations.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DonationRecord::destroy($id);

        return redirect()->route('donations.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
