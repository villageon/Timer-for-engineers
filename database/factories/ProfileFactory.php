<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'contents' => $this->faker->realText(),
        ];
    }
}
