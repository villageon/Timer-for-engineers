<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ranking>
 */
class RankingFactory extends Factory
{
    
    public function definition()
    {
        return [
            'user_id' =>  User::factory(),
            'fif_all' => $this->faker->randomFloat(1, 0, 100),
            'fif_month' => $this->faker->randomFloat(1, 0, 100),
            'fif_day' => $this->faker->randomFloat(1, 0, 100),
            'thi_all' => $this->faker->randomFloat(1, 0, 100),
            'thi_month' => $this->faker->randomFloat(1, 0, 100),
            'thi_day' => $this->faker->randomFloat(1, 0, 100),
        ];
    }
}
