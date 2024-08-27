<?php

namespace Database\Factories;

use App\Models\Jobse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobse>
 */
class JobseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraphs(3, true),
            'salary' => fake()->numberBetween(5_000, 180_000),
            'location' => fake()->city,
            'category' => fake()->randomElement(Jobse::$category),
            'experience' => fake()->randomElement(Jobse::$experience),

        ];
    }
}
