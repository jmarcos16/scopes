<?php

namespace Database\Factories;

use App\Models\User;
use App\TickerStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'user_id' => User::factory(),
        ];
    }
}
