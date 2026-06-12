<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\KaderController;
use App\Http\Controllers\Admin\PostController;

// Publik
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard Umum 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN 
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('kader', KaderController::class);
    Route::resource('post', PostController::class);
});

//KADER 
Route::middleware(['auth', 'role:kader'])->prefix('kader')->name('kader.')->group(function () {});

require __DIR__ . '/auth.php';
