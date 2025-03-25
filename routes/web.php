<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::middleware('guest')->group(function () {
Route::get('/', [AuthController::class, 'login'])->name('getLogin');
});
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::view('/reset-password/{token}', 'auth.reset-password')->name('password.reset');

// Authentication Actions
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::post('/login', [AuthController::class, 'saveLogin'])->name('login');
Route::post('/login', [AuthController::class, 'register'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

