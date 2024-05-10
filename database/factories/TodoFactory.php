<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->realText(100),
            'detail' => fake()->realText(2000),
            'due' => fake()->dateTimeBetween('-1 weeks', '1 weeks'),
            'scheduled' => fake()->dateTimeBetween('-1 weeks', '1 weeks'),
            'priority' => fake()->numberBetween(0, 5),
            'isCompleted' => fake()->boolean(50)
        ];
    }
}
