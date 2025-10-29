<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeightLog;
use App\Models\User;

class WeightLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=User::first();

        WeightLog::factory()
            ->count(35)
            ->state(['user_id' => $user->id])
            ->create();
    }
}
