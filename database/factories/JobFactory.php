<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

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
    public $currency = [
        'npr',
        'inr',
        'usd',
        'euro'
    ];
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'image' => 'https://unsplash.com/photos/a-laptop-computer-sitting-on-top-of-a-table-T0wC7aHAUUs',
            'currency' => fake()->randomElement($this->currency),
            'salary' => fake()->numberBetween(40000,50000),
            'description' => fake()->text(100),
            'user_id' => fake()->numberBetween(1,15),
            'tag_id' => Tag::factory(),
        ];
    }
}
