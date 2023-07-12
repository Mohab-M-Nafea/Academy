<?php

namespace App\Http\Controllers\Public\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentPasswordResetRequest;
use App\Models\Student;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $token)
    {
        return view('public.students.reset', compact('token'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentPasswordResetRequest $request)
    {
        $status = Password::reset(
            $request->validated(),
            function (Student $student, string $password) {
                $student->forceFill([
                    'password' => $password
                ]);

                $student->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('student.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
