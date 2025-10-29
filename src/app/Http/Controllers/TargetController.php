<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget; // Q1: モデルを読み込む

class TargetController extends Controller
{
    // 目標体重の編集画面表示
    public function edit()
    {
        // Q2: ログイン中のユーザーの目標体重を取得
        $target = WeightTarget::where('user_id', auth()->id())->first();

        // Q3: ビューを返す（targets.edit.blade.php へ $target を渡す）
        return view('targets.edit', ['target' => $target]);
    }

    // 目標体重の更新処理
    public function update(Request $request)
    {
        // Q4: バリデーション（仕様書準拠）
        $validated = $request->validate([
            'target_weight' => ['required', 'numeric', 'max:9999.9'],
        ]);

        // Q5: 対象データを取得し、更新
        $target = WeightTarget::where('user_id', auth()->id())->first();
        $target->update($validated);

        // Q6: 完了後リダイレクト
        return redirect()->route('weights.index')->with('success', '目標体重を更新しました！');
    }
}

