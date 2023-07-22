<?php

namespace Database\Factories;


use App\Models\UserStatus;
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
            'status_id' => UserStatus::inRandomOrder()->value('status_id'),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date(),
            'nic' => $this->faker->numberBetween(1999-2023),
            'licence_id' => $this->faker->numberBetween(1999-2023),
            'email' => $this->faker->email(),
            'password' => $this->faker->numberBetween(1-10),
            'blood_group' => $this->faker->randomElement(['A-','B-','AB-','O-','A+','B+','AB+','O+']),
            'license_issue_date' => $this->faker->date(),
            'license_expire_date' => $this->faker->date(),
            'points' => $this->faker->numberBetween(0,1000),
        ];
    }


}
