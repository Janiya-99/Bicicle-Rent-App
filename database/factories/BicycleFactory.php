<?php

namespace Database\Factories;

use App\Models\BicycleStatus;
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
            'status_id' => BicycleStatus::inRandomOrder()->value('id'),
            'qr_code' => $this->faker->ean8,
            'height' => $this->faker->numberBetween(100,200),
            'weight' => $this->faker->numberBetween(10,15),
            'manufactured' => $this->faker->date('Y'),
            'live_lang' => $this->faker->latitude($min = -90, $max = 90),
            'live_long' => $this->faker->longitude(180,180),
            'temp_pin' => $this->faker->numberBetween(0,180)
        ];
    }
}
