<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        $index = rand(0, 1);

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->password()),
            'phone' => $this->faker->phoneNumber(),
            'specialization' => $this->faker->jobTitle(),
            'gender' => $index? 'male': 'female',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
