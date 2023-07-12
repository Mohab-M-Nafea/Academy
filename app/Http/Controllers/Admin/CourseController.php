<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    use ImageTrait;

    private string $folder = 'courses';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::latest('updated_at')->get();

        $breadcrumb = [
            'admin.courses' => 'Courses'
        ];

        return view('admin.courses.index', compact('courses', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();

        $teachers = Teacher::all();

        $breadcrumb = [
            'admin.courses' => 'Courses',
            'New Course'
        ];

        return view('admin.courses.add', compact('categories', 'teachers', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->storeImage($request, $this->folder);

        Course::create($validated);

        return redirect()->route('admin.courses');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        $categories = Category::all();

        $teachers = Teacher::all();

        $breadcrumb = [
            'admin.courses' => 'Courses',
            'Edit Course'
        ];

        return view('admin.courses.edit', compact('course', 'categories', 'teachers', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->updateImage($request, $course->image, $this->folder);

        $course->update($validated);

        return redirect()->route('admin.courses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        $this->deleteImage($course->image, $this->folder);

        Course::destroy($course->id);

        return redirect()->route('admin.courses');
    }
}
