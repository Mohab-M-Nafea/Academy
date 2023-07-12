<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $coursesCount = Course::all()->count();

        $teachersCount = Teacher::all()->count();

        $studentsCount = Student::all()->count();

        $topCourses = Course::withCount('student')
            ->latest('student_count')
            ->limit(3)
            ->get();

        return view('public.index', compact(
            'coursesCount',
            'teachersCount',
            'studentsCount',
            'topCourses'
        ));
    }
}
