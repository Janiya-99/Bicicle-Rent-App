<?php

namespace Database\Factories;

use App\Models\Bicycle;
use App\Models\Path;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gps>
 */
class GpsFactory extends Factory
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
            'path_id' => Path::inRandomOrder()->value('path_id'),
            'gps_points_lang' => $this->faker->latitude(-90, 90),
            'gps_points_long' => $this->faker->longitude(-180, 180)

        ];
    }
}
