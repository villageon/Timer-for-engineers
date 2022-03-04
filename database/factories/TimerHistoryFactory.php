<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimerHistory>
 */
class TimerHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->numberBetween(1, 2),
            'judge' => $this->faker->numberBetween(1, 2),
            'comment' => $this->faker->realText(20),
        ];
    }
}
