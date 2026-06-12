<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Jalur Publik
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Jalur Dashboard Umum (Bisa diakses Admin & Kader jika sudah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Jalur Profile Bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================================================
// TAMBAHAN: BLOK ROUTE KHUSUS BERDASARKAN ROLE
// =======================================================

// 4. Blok Khusus ADMIN (Hanya bisa diakses jika role = admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {


});

// 5. Blok Khusus KADER (Hanya bisa diakses jika role = kader)
Route::middleware(['auth', 'role:kader'])->prefix('kader')->name('kader.')->group(function () {


});

require __DIR__ . '/auth.php';
