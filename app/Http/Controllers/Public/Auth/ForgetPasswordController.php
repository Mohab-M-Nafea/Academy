<?php

namespace App\Http\Controllers\Public\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('public.students.forget');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ForgetPasswordRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $status = Password::sendResetLink(
            $validated
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('student.forget.notification')
            : back()->withErrors(['email' => __($status)]);
    }
}
