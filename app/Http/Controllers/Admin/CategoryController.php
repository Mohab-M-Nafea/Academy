<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use ImageTrait;

    private string $folder = 'categories';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest('updated_at')->get();

        $breadcrumb = [
            'admin.categories' => 'Categories'
        ];

        return view('admin.categories.index', compact('categories', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $breadcrumb = [
            'admin.categories' => 'Categories',
            'New Category'
        ];

        return view('admin.categories.add', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->storeImage($request, $this->folder);

        Category::create($validated);

        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        $courses = $category->courses;

        $breadcrumb = [
            'admin.categories' => 'Categories',
            'Courses'
        ];

        $parent = $category->name;

        return view('admin.courses.index', compact('courses', 'breadcrumb', 'parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $breadcrumb = [
            'admin.categories' => 'Categories',
            'Edit Category'
        ];

        return view('admin.categories.edit', compact('category', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $validated['image'] = $this->updateImage($request, $category->image, $this->folder);

        $category::update($validated);

        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->deleteImage($category->image, $this->folder);

        Category::destroy($category->id);

        return redirect()->route('admin.categories');
    }
}
