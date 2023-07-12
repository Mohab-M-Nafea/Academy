<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseStudentFactory extends Factory
{
    protected $model = CourseStudent::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'course_id' => Course::select('id')->inRandomOrder()->limit(1)->first(),
            'student_id' => Student::select('id')->inRandomOrder()->limit(1)->first(),
        ];
    }
}
