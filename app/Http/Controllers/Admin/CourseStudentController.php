<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseStudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student): View
    {
        $courses = Course::all();

        $breadcrumb = [
            'students' => 'Students',
            'student.courses' => 'Courses',
            'Enroll Course'
        ];

        $params = $student;

        return view('admin.students.courses.enroll', compact('student', 'courses', 'breadcrumb', 'params'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseStudentRequest $request, Student $student): RedirectResponse
    {
        $student->courses()->attach($request->validated());

        return redirect()->route('student.courses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, string $id): RedirectResponse
    {
        $student->courses()->detach($id);

        return redirect()->route('student.courses');
    }
}
