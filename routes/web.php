<?php

use App\Http\Controllers\Public\CategoryController as CategoryController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\CourseController as CourseController;
use App\Http\Controllers\Public\EnrollmentController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::resource('/categories', CategoryController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'categories',
        'show' => 'category.show'
    ]);

Route::resource('/courses', CourseController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'courses',
        'show' => 'course.show'
    ]);

Route::post('courses/enroll', EnrollmentController::class)->name('course.enroll');

Route::controller(ContactController::class)
    ->group(function () {
        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact/send', 'sendContact')->name('contact.send');
    });

require __DIR__ . '/student/auth.php';
require __DIR__ . '/admin/web.php';
