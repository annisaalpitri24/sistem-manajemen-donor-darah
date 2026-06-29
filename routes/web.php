<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\DonationRecordController;
use App\Http\Controllers\PendonorDashboardController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\UserController;
use App\Models\BloodDonor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {


    $a = BloodDonor::where('blood_type', 'LIKE', 'A%')->count();
    $b = BloodDonor::where('blood_type', 'LIKE', 'B%')->count();
    $ab = BloodDonor::where('blood_type', 'LIKE', 'AB%')->count();
    $o = BloodDonor::where('blood_type', 'LIKE', 'O%')->count();


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

    Route::get(
        '/admin/dashboard',
        [AdminDashboardController::class, 'index']
    );

    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:petugas'])->group(function () {

    Route::get(
        '/petugas/dashboard',
        [PetugasDashboardController::class, 'index']
    );
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
