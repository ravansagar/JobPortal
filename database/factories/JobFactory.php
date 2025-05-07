<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'image' => fake()->image(),
            'salary' => fake()->numberBetween(4000,5000),
            'description' => fake()->text(100),
            'user_id' => fake()->numberBetween(1,10),
            'tag_id' => fake()->numberBetween(1,10),
        ];
    }
}
