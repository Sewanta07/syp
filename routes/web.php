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
Route::post('/register', [AuthController::class, 'register'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::post('/profile-update', [AuthController::class, 'update'])->name('user.update');

Route::get('/inventory', [DashboardController::class, 'inventory'])->name('dashboard.inventory');
Route::get('/product', [DashboardController::class, 'product'])->name('dashboard.product');
Route::post('/inventory', [DashboardController::class, 'saveInventory'])->name('inventory.save');
Route::get('/inventory/edit/{id}', [DashboardController::class, 'editInventory'])->name('dashboard.edit-inventory');
Route::post('/inventory/update/{id}', [DashboardController::class, 'updateInventory'])->name('dashboard.update-inventory');
Route::get('/inventory-show/{id}', [DashboardController::class, 'showInventory'])->name('dashboard.view-inventory');
Route::delete('/inventory-delete/{id}', [DashboardController::class, 'delete'])->name('dashboard.delete-inventory');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile.profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/aboutus', [DashboardController::class, 'aboutus'])->name('aboutus.aboutus');
