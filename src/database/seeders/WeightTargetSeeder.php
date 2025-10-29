<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeightTarget;

class WeightTargetSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        WeightTarget::factory()->count(1)->create();
    }
}

