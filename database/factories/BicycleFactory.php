<?php

namespace Database\Factories;

use App\Models\BicycleType;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bicycle>
 */
class BicycleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'type_id' => BicycleType::inRandomOrder()->value('id'),
            'qr_code' => $this->faker->ean8,
            'live_lang' => $this->faker->latitude($min = -90, $max = 90),
            'live_long' => $this->faker->longitude(180,180),
            'status' => $this->faker->randomElement(['F','NF']),
            'temp_pin' => $this->faker->numberBetween(0,180)

        ];
    }
}
