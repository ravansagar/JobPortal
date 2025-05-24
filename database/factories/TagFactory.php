<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    protected $jobTypes = [
        'Frontend Developer',
        'Backend Developer',
        'Software Engineer',
        'Marketing Manager',
        'Product Manager',
        'Graphic Designer',
        'Data Scientist',
        'HR Specialist',
        'Sales Executive',
        'Business Analyst',
    ];
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->jobTypes),
        ];
    }
}
