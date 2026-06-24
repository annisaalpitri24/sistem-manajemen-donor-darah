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

            // HANYA untuk pendonor
            if (
                Auth::user()->role == 'pendonor'
                && Auth::user()->status == 'pending'
            ) {

                Auth::logout();

                return back()->with(
                    'error',
                    'Akun Anda masih menunggu persetujuan Admin/Petugas.'
                );
            }

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
        }

        return back()->with('error', 'Email atau Password salah');
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
        ], [
            'name.required' => 'Nama wajib diisi.',
            'blood_type.required' => 'Golongan darah wajib dipilih.',
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'phone.required' => 'Nomor HP wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pendonor',
            'status' => 'pending'
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
            ->with('success', 'Registrasi berhasil, menunggu persetujuan admin.');
    }
}
