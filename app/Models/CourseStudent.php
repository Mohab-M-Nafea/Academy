<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'course_student';

    protected $fillable = [
        'course_id',
        'student_id',
        'status',
    ];
}
