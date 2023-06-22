<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date(),
            'nic' => $this->faker->numberBetween(1999-2023),
            'licence_id' => $this->faker->numberBetween(1999-2023),
            'email' => $this->faker->email(),
            'blood_group' => $this->faker->randomElement(['A-','B-','AB-','O-','A+','B+','AB+','O+']),
            'license_issue_date' => $this->faker->date(),
            'license_expire_date' => $this->faker->date(),
            'points' => $this->faker->numberBetween(0,1000),
            'google_id' => $this->faker-> md5
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
