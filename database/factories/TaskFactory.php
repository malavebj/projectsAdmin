<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(8),
            'description' => fake()->paragraph(),
            'project_id' => fake()->numberBetween(1,5),
            'user_id' => fake()->numberBetween(1,10),
            'deadline' => now()->addDays(fake()->numberBetween(10,30)),
        ];
    }
}
