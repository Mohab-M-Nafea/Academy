<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        Category::factory(6)->create();
//        Teacher::factory(13)->create();
//        Course::factory(75)->create();
//        Student::factory(154)->create();
//        CourseStudent::factory(211)->create();
        Admin::create([
            'first_name' => 'Mohab',
            'last_name' => 'Mohamed',
            'username' => 'mohabmohamed',
            'email' => 'mohab3737@gmail.com',
            'password' => 'Mohab3737@yahoo',
        ]);
    }
}
