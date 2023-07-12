<?php


use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\ProfileController;

Route::middleware('guest:admins')->prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('admin.login');
        Route::post('login', 'auth')->name('admin.auth');
    });
});

Route::middleware('auth:admins')->prefix('admin')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'edit')->name('admin.profile');
        Route::put('profile', 'update')->name('admin.profile.update');
    });
});
