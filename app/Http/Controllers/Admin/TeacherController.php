<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeacherController extends Controller
{
    use ImageTrait;

    private string $folder = 'teachers';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::latest('updated_at')->get();

        $breadcrumb = [
            'teachers' => 'Teachers',
        ];

        return view('admin.teachers.index', compact('teachers', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $breadcrumb = [
            'teachers' => 'Teachers',
            'teacher.add' => 'New Teacher'
        ];

        return view('admin.teachers.add', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->storeImage($request, $this->folder);

        Teacher::create($validated);

        return redirect()->route('teachers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher): View
    {
        $courses = $teacher->courses;

        $breadcrumb = [
            'teachers' => 'Teachers',
            'Courses'
        ];

        $parent = $teacher->first_name . ' ' . $teacher->last_name;

        return view('admin.courses.index', compact('courses', 'breadcrumb', 'parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher): View
    {
        $breadcrumb = [
            'teachers' => 'Teachers',
            'Edit Teacher'
        ];

        return view('admin.teachers.edit', compact('teacher', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->updateImage($request, $teacher->image, $this->folder);

        $teacher->update($validated);

        return redirect()->route('teachers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher): RedirectResponse
    {
        $this->deleteImage($teacher->image, $this->folder);

        Teacher::destroy($teacher->id);

        return redirect()->route('teachers');
    }
}
