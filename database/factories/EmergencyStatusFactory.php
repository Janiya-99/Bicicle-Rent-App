<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmergencyStatus>
 */
class EmergencyStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'emergency_status' => $this->faker->randomElement(['Broken', 'Battey-Low', 'Chain-Break'])
            
        ];
    }
}
