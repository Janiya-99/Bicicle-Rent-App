<?php

namespace Database\Factories;

use App\Models\Bicycle;
use App\Models\EmergencyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emergency>
 */
class EmergencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'bicycle_id' => Bicycle::inRandomOrder()->value('bicycle_id'),
            'emergency_status_id' => EmergencyStatus::inRandomOrder()->value('emergency_status_id'),
            'lang' => $this->faker->latitude(-90, 90),
            'long' => $this->faker->longitude(-180, 180),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'description' => $this->faker->paragraph(3)
        ];
    }
}
