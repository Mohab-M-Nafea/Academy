<?php

namespace App\Http\Controllers\Public\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudentProfileRequest;

class ProfileController extends Controller
{
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
    public function edit()
    {
        $student = auth()->user();

        return view('public.students.profile', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentProfileRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->update($validated);

        return redirect()->route('student.profile');
    }
}
