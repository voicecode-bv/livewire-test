<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Shortlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)
            ->has(Shortlist::factory()->count(5))
            ->create();

        \App\Models\User::factory()
            ->has(Shortlist::factory()->count(5))
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('secret'),
            ]);
    }
}
