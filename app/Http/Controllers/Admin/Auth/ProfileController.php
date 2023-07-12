<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Traits\ImageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use ImageTrait;

    private string $folder = 'admins';

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        $admin = auth('admins')->user();

        $breadcrumb = [
            'admin.profile' => 'Profile'
        ];

        return view('admin.profile', compact('admin', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminProfileRequest $request): RedirectResponse
    {
        $admin = auth('admins')->user();

        $validated = $request->validated();

        $validated['image'] = $this->updateImage($request, $admin->image, $this->folder);

        $admin->update($validated);

        return redirect()->route('admin.profile');
    }
}
