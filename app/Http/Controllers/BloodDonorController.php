<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BloodDonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $donors = BloodDonor::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('blood_type', 'like', "%{$search}%");
        })->get();

        return view('blood_donors.index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blood_donors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'blood_type' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pendonor',
        ]);

        BloodDonor::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'blood_type' => $request->blood_type,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('blood-donors.index')
            ->with('success', 'Pendonor berhasil ditambahkan');
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
        $donor = BloodDonor::findOrFail($id);

        return view('blood_donors.edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donor = BloodDonor::findOrFail($id);

        $donor->update([
            'name' => $request->name,
            'blood_type' => $request->blood_type,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        if ($donor->user) {

            $donor->user->name = $request->name;
            $donor->user->email = $request->email;

            if (!empty($request->password)) {
                $donor->user->password = Hash::make($request->password);
            }

            $donor->user->save();
        }

        return redirect()->route('blood-donors.index')
            ->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donor = BloodDonor::findOrFail($id);

        if ($donor->user_id) {
            User::destroy($donor->user_id);
        }

        $donor->delete();

        return redirect()
            ->route('blood-donors.index')
            ->with('success', 'Pendonor berhasil dihapus');
    }
}
