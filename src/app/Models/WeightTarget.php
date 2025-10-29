<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ← ✅これを追加
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory; // ← ✅これも追加

    protected $fillable = [
        'user_id',
        'target_weight',
    ];
}

