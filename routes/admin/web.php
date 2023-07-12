<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseStudentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;

Route::middleware('auth:admins')->prefix('dashboard')->group(function () {
    Route::get('', DashboardController::class)
        ->name('dashboard');

    Route::resource('admins', AdminController::class)
        ->names([
            'index' => 'admins',
            'create' => 'admin.add',
            'store' => 'admin.store',
            'edit' => 'admin.edit',
            'update' => 'admin.update',
            'destroy' => 'admin.delete'
        ]);

    Route::resource('teachers', TeacherController::class)
        ->names([
            'index' => 'teachers',
            'create' => 'teacher.add',
            'store' => 'teacher.store',
            'edit' => 'teacher.edit',
            'show' => 'teacher.courses',
            'update' => 'teacher.update',
            'destroy' => 'teacher.delete'
        ]);

    Route::resource('students', StudentController::class)
        ->names([
            'index' => 'students',
            'create' => 'student.add',
            'store' => 'student.store',
            'edit' => 'student.edit',
            'show' => 'student.courses',
            'update' => 'student.update',
            'destroy' => 'student.delete'
        ]);

    Route::resource('categories', CategoryController::class)
        ->names([
            'index' => 'admin.categories',
            'create' => 'category.add',
            'store' => 'category.store',
            'edit' => 'category.edit',
            'show' => 'category.courses',
            'update' => 'category.update',
            'destroy' => 'category.delete'
        ]);

    Route::resource('courses', CourseController::class)
        ->names([
            'index' => 'admin.courses',
            'create' => 'course.add',
            'store' => 'course.store',
            'edit' => 'course.edit',
            'update' => 'course.update',
            'destroy' => 'course.delete'
        ]);

    Route::resource('students/{student}/courses', CourseStudentController::class)
        ->only(['create', 'store', 'destroy'])
        ->names([
            'create' => 'student.course_enroll',
            'store' => 'student.enroll_store',
            'destroy' => 'student.course_delete'
        ]);
});

require __DIR__ . '/auth.php';
