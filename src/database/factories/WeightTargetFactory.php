<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeightTarget>
 */
class WeightTargetFactory extends Factory
{
    public function definition(): array
    {
        return [
            // usersテーブルと紐づけ
            'user_id' =>User::factory(),

            // 目標体重（40〜80kg・小数1桁）
            'target_weight' =>$this->faker->randomFloat(1, 40, 80),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
