<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(4)
            ->hasCards(2)
            ->hasTransactions(2)
            ->hasUserContacts(2)
            ->create();

        User::factory()
            ->count(2)
            ->hasCards(4)
            ->hasTransactions(4)
            ->hasUserContacts(1)
            ->create();

        User::factory()
            ->count(2)
            ->hasCards(1)
            ->hasTransactions(1)
            ->create();

        User::factory()
            ->count(12)
            ->hasUserContacts(1)
            ->create();

        User::factory()
            ->count(8)
            ->hasCards(1)
            ->hasTransactions(5)
            ->hasUserContacts(1)
            ->create();

        User::factory()
            ->count(8)
            ->hasCards(1)
            ->hasTransactions(2)
            ->hasUserContacts(2)
            ->create();
    }
}
