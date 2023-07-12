<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('admin.login');
    }

    public function auth(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();


        if (auth('admins')->attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(['Email or Password incorrect'])
            ->withInput([
                'email' => $validated['email']
            ]);
    }

    public function logout(): RedirectResponse
    {
        auth('admins')->logout();

        return redirect()->route('admin.login');
    }
}
