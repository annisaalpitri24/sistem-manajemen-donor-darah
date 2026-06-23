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
            })
            ->get();

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
        DonationRecord::create($request->all());

        $donor = BloodDonor::find($request->donor_id);

        $donor->total_donations += 1;
        $donor->last_donation_date = $request->donation_date;
        $donor->save();

        return redirect()->route('donations.index');
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