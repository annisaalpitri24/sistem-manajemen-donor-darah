<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            if (Auth::user()->role == 'petugas') {
                return redirect('/petugas/dashboard');
            }
            if (Auth::user()->role == 'pendonor') {
                return redirect('/pendonor/dashboard');
            }

            return redirect('/');
        };
        return back()->with('error', 'Login gagal');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'blood_type' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pendonor'
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

        return redirect('/login')
            ->with('success', 'Registrasi berhasil');
    }
}
