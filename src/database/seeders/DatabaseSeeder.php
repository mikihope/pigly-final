<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,  // ← 1番目にユーザー
            WeightTargetSeeder::class,  // ← 2番目に目標体重::class,  // ← 2番目に目標体重
            WeightLogSeeder::class,  // ← 3番目に体重ログ
        ]);
    }
}

