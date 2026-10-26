<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nis' => fake()->randomNumber(5, true),
            'classroom' => fake()->randomElement(['11 PPLG 1', '11 PPLG 2', '11 PPLG 3']),
            'address' => fake()->address(),
        ];
    }
}
