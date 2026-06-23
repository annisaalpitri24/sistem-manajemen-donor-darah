<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\DonationRecordController;
use App\Http\Controllers\PendonorDashboardController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/', function () {
    return view('home');
});
//Route::get('/admin/dashboard', function () {
//    return view('admin.dashboard');
//})->middleware('auth');

//Route::get('/petugas/dashboard', function () {
//    return view('petugas.dashboard');
//})->middleware('auth');

Route::resource('blood-donors', BloodDonorController::class);

Route::resource('donations', DonationRecordController::class);

Route::get(
    '/admin/dashboard',
    [AdminDashboardController::class, 'index']
)
    ->middleware(['auth', 'role:admin']);

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas/dashboard', [PetugasDashboardController::class, 'index']);
});

Route::resource('users', UserController::class)
    ->middleware(['auth', 'role:admin']);

Route::get('/pendonor/dashboard', function () {
    return view('pendonor.dashboard');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/pendonor/dashboard',
        [PendonorDashboardController::class, 'index']
    );
});