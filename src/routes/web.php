<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\RegisterController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// ===============================
// 🔐 認証関連（Fortify）
// ===============================

// ログイン画面を表示
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// ログイン処理
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// ログアウト処理
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// ===============================
// 🧍 会員登録ページ
// ===============================
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('register.store');

// ===============================
// ⚖️ 体重管理（ログイン後）
// ===============================
Route::middleware(['auth'])->group(function () {
    Route::get('/weights', [WeightController::class, 'index'])->name('weights.index');
    Route::get('/weight/target/edit', [WeightController::class, 'edit'])->name('weights.edit');
    Route::put('/weight/target/update', [WeightController::class, 'update'])->name('weights.update');
});

