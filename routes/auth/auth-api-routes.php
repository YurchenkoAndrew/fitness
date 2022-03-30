<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

//Register
Route::post('register', [AuthController::class, 'register'])->middleware(['guest', 'throttle:6,1'])->name('auth.register');

// Verify email
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

// Resend link to verify email
Route::post('/email/verify/resend', [AuthController::class, 'resend'])->middleware(['guest', 'throttle:6,1'])->name('verification.send');

//Login User
Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
