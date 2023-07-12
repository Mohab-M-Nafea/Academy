<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::latest('updated_at')->get();

        $breadcrumb = [
            'students' => 'Students',
        ];

        return view('admin.students.index', compact('students', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $breadcrumb = [
            'students' => 'Students',
            'New Student'
        ];

        return view('admin.students.add', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        Student::create($request->validated());

        return redirect()->route('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        $courses = $student->courses;

        $breadcrumb = [
            'students' => 'Students',
            'Courses'
        ];

        return view('admin.students.courses.index', compact('student', 'courses', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        $breadcrumb = [
            'students' => 'Students',
            'Edit Student'
        ];

        return view('admin.students.edit', compact('student', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return redirect()->route('students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        Student::destroy($student->id);

        return redirect()->route('students');
    }
}
