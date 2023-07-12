<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $categoriesCount = Category::all()->count();

        $coursesCount = Course::all()->count();

        $teachersCount = Teacher::all()->count();

        $studentsCount = Student::all()->count();

        $topCourses = Course::withCount('student')
            ->latest('student_count')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'coursesCount',
            'teachersCount',
            'studentsCount',
            'topCourses'
        ));
    }
}
