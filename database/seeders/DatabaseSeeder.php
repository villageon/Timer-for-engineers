<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Ranking;
use App\Models\TimerHistory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            // UserSeeder::class,
            // ProfileSeeder::class,
            // TimerHistorySeeder::class,
        ]);

        // User::factory(100)->create();
        // Profile::factory(100)->create();
        Ranking::factory(100)->create();
        TimerHistory::factory(1000)->create();
    }
}
