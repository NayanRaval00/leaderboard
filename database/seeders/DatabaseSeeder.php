<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create()->each(function ($user) {
            for ($i = 0; $i < rand(5, 15); $i++) {
                Activity::create([
                    'user_id' => $user->id,
                    'points' => 20,
                    'activity_date' => Carbon::now()->subDays(rand(0, 30))
                ]);
            }
        });
    }
}
