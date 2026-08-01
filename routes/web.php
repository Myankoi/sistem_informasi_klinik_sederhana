<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin');
Route::get('/pasien/dashboard', [DashboardController::class, 'pasien'])->name('dashboard.pasien');
Route::get('/dokter/dashboard', [DashboardController::class, 'dokter'])->name('dashboard.dokter');
Route::get('/apoteker/dashboard', [DashboardController::class, 'apoteker'])->name('dashboard.apoteker');
Route::get('/owner/dashboard', [DashboardController::class, 'owner'])->name('dashboard.owner');
