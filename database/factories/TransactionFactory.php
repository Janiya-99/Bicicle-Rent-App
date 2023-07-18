<?php

namespace Database\Factories;

use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_status_id' => TransactionStatus::inRandomOrder()->value('id'),
            'amount' => $this->faker->numberBetween(100,100000),
        ];
    }
}
