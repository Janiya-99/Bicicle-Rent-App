<?php

namespace Database\Factories;

use App\Models\Bicycle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Path>
 */
class PathFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>  User::inRandomOrder()->value('user_id'), // Provide a valid user_id value
            'bicycle_id' => Bicycle::inRandomOrder()->value('bicycle_id'),
            'start_long' => $this->faker->longitude(-180, 180),
            'start_lang' => $this->faker->latitude(-90, 90),
            'end_long' => $this->faker->longitude(-180, 180),
            'end_lang' => $this->faker->latitude(-90, 90),
            'distance' => $this->faker->numberBetween(1, 10000) / 100
        ];
    }
}
