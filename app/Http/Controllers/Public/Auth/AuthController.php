<?php

namespace App\Http\Controllers\Public\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RestPasswordRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        $previous = url()->previous();
        if ($previous !== route('student.register') && !in_array(explode('/', $previous)[3], ['admin', 'dashboard'])) {
            session(['last_page' => session()->previousUrl()]);
        }

        return view('public.students.login');
    }

    public function auth(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if (auth()->attempt($validated, $request->remember)) {
            $request->session()->regenerate();

            $url = session('last_page');
            session()->forget('last_page');
            $url = $url === route('student.logout') || is_null($url) ? route('home') : $url;

            return redirect($url);
        }

        return back()
            ->withErrors(['Email or Password incorrect'])
            ->withInput([
                'email' => $validated['email']
            ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}
