<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\DonationRecordController;
use App\Http\Controllers\PendonorDashboardController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\BloodDonor;
use App\Models\DonationRecord;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    // STOK DARAH (hanya donor yang diterima)
    $a = DonationRecord::where('status', 'diterima')
        ->whereHas('donor', function ($q) {
            $q->where('blood_type', 'A+')
                ->orWhere('blood_type', 'A-');
        })->count();

    $b = DonationRecord::where('status', 'diterima')
        ->whereHas('donor', function ($q) {
            $q->where('blood_type', 'B+')
                ->orWhere('blood_type', 'B-');
        })->count();

    $ab = DonationRecord::where('status', 'diterima')
        ->whereHas('donor', function ($q) {
            $q->where('blood_type', 'AB+')
                ->orWhere('blood_type', 'AB-');
        })->count();

    $o = DonationRecord::where('status', 'diterima')
        ->whereHas('donor', function ($q) {
            $q->where('blood_type', 'O+')
                ->orWhere('blood_type', 'O-');
        })->count();


    // Statistik pendonor berdasarkan jenis kelamin
    $laki = BloodDonor::where('gender', 'M')->count();

    $perempuan = BloodDonor::where('gender', 'F')->count();

    return view('home', compact(
        'a',
        'b',
        'ab',
        'o',
        'laki',
        'perempuan'
    ));
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard Admin
    Route::get(
        '/admin/dashboard',
        [AdminDashboardController::class, 'index']
    );

    // Profil Admin (harus login sebagai admin)
    Route::get(
        '/admin/profile',
        [AdminDashboardController::class, 'profile']
    )->name('admin.profile');

    // CRUD Manajemen User
    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:petugas'])->group(function () {

    // Dashboard Petugas
    Route::get(
        '/petugas/dashboard',
        [PetugasDashboardController::class, 'index']
    );

    // Profil Petugas (harus login sebagai petugas)
    Route::get(
        '/petugas/profile',
        [PetugasDashboardController::class, 'profile']
    )->name('petugas.profile');
});

/*
|--------------------------------------------------------------------------
| Admin & Petugas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource('blood-donors', BloodDonorController::class);

    Route::resource('donations', DonationRecordController::class);

    Route::post(
        '/users/{id}/approve',
        [UserController::class, 'approve']
    )->name('users.approve');
});


/*
|--------------------------------------------------------------------------
| Pendonor
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/pendonor/dashboard',
        [PendonorDashboardController::class, 'index']
    );

    Route::get(
        '/pendonor/profil',
        [PendonorDashboardController::class, 'profil']
    );

    Route::get(
        '/pendonor/riwayat',
        [PendonorDashboardController::class, 'riwayat']
    );

    Route::get(
        '/pendonor/jadwal',
        [PendonorDashboardController::class, 'jadwal']
    );
});

/*
|--------------------------------------------------------------------------
| Laporan
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/pdf', [ReportController::class, 'pdf'])
        ->name('reports.pdf');
});
