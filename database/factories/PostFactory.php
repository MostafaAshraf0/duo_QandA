<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'student_name' => $this->faker->sentence(),
            'student_number' => $this->faker->company(),
            'department' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'tags' => 'laravel,api,backend',
            'description' => $this->faker->paragraph(5),
        ];
    }
}
