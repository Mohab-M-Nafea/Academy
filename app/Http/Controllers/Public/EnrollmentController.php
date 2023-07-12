<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollCourseRequest;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{
    public function __invoke(EnrollCourseRequest $request)
    {
        $student = auth()->user();
        if ($student) {
            $student->courses()->attach($request->validated(), [
                'id' => Str::ulid()
            ]);

            return redirect(url()->previous());
        } else {
            return redirect()->route('student.login');
        }
    }
}
