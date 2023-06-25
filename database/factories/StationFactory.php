<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'name' => $this->faker->company(),
            'lang' => $this->faker->latitude(-90,90),
            'long' => $this->faker->longitude(-180,180),
            'description' => $this->faker->paragraph(4),
            'is_open' => $this->faker->randomElement(['o','c']),
            'address_line_1' => $this->faker->address(),
            'address_line_2' => $this->faker->streetName(),
            'address_line_3' => $this->faker->city()
        ];
    }
}
