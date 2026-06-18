<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store']);
    Route::get('register', [AuthController::class, 'create'])->name('register');
    Route::post('register', [AuthController::class, 'store']);
    Route::get('forgot-password', [AuthController::class, 'forgot'])->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [AuthController::class, 'reset'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'updatePassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
    Route::post('email/resend', [AuthController::class, 'resendVerification'])->name('verification.resend');
    Route::get('confirm-password', [AuthController::class, 'confirm'])->name('password.confirm');
    Route::post('confirm-password', [AuthController::class, 'storeConfirm']);
});
