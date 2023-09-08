<?php

namespace Database\Factories;

use App\Models\Path;
use App\Models\User;
use App\Models\Bicycle;
use App\Models\Station;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecentActivity>
 */
class RecentActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('user_id'),
            'path_id' => Path::inRandomOrder()->value('path_id'),
            'station_id' => Station::inRandomOrder()->value('station_id'),
            'bicycle_id' => Bicycle::inRandomOrder()->value('bicycle_id'),
            'amount' => $this->faker->randomFloat(2,0,100),
            'payment_type_id' => PaymentType::inRandomOrder()->value('payment_id'),
            'date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time()
        ];
    }
}
