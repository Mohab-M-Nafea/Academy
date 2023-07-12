<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    use ImageTrait;

    private string $folder = 'admins';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $admins = Admin::latest('updated_at')
            ->where('id', '!=', auth('admins')->user()->id)
            ->get();

        $breadcrumb = [
          'admins' => 'Admins'
        ];

        return view('admin.admins.index', compact('admins', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $breadcrumb = [
            'admins' => 'Admins',
            'admin.add' => 'New Admin'
        ];

        return view('admin.admins.add', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->storeImage($request, $this->folder);

        Admin::create($validated);

        return redirect()->route('admins');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin): View
    {
        $breadcrumb = [
            'admins' => 'Admins',
            'Edit Admin'
        ];

        return view('admin.admins.edit', compact('admin', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {
        $validated = $request->validated();

        $validated['image'] = $this->updateImage($request, $admin->image, $this->folder);

        $admin->update($validated);

        return redirect()->route('admins');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin): RedirectResponse
    {
        $this->deleteImage($admin->image, $this->folder);

        Admin::destroy($admin->id);

        return redirect()->route('admins');
    }
}
