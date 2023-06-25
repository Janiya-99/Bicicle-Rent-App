<?php

namespace Database\Factories;


use App\Models\RecentActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weather>
 */
class WeatherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

        'recent_activity_id' => RecentActivity::inRandomOrder()->value('activity_id'),
        'wind_speed' => $this->faker->randomFloat(2, 0, 200),
        'temperature' => $this->faker->randomFloat(2, -10, 40),
        'visibility' => $this->faker->numberBetween(0, 100),
        'humidity' => $this->faker->randomFloat(2, 0, 100),
        'weather_status' => $this->faker->randomElement(['Good', 'Bad', 'Normal', 'Cloudy', 'Rainy', 'Sunny']),

        ];
    }
}
