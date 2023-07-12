<?php

use App\Http\Controllers\Public\Auth\AuthController;
use App\Http\Controllers\Public\Auth\ForgetPasswordController;
use App\Http\Controllers\Public\Auth\ProfileController;
use App\Http\Controllers\Public\Auth\RegisterController;
use App\Http\Controllers\Public\Auth\ResetPasswordController;

Route::middleware('guest')->prefix('student')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('student.login');
        Route::post('login', 'auth')->name('student.auth');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'create')->name('student.register');
        Route::post('register', 'store')->name('student.store_student');
    });

    Route::controller(ForgetPasswordController::class)->group(function () {
        Route::get('forget-password', 'create')->name('student.forget');
        Route::post('forget-password', 'store')->name('student.forget.send');
    });

    Route::view('forget-password/notification', 'public.students.password_reset_notification')
        ->name('student.forget.notification');

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'create')->name('password.reset');
        Route::post('reset-password', 'store')->name('password.store');
    });
});

Route::middleware('auth')->prefix('student')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('student.logout');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'edit')->name('student.profile');
        Route::put('profile', 'update')->name('student.profile.update');
    });
});
