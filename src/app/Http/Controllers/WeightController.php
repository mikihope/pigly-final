<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    /**
     * 体重一覧画面（ログイン後のメイン画面）
     */
    public function index()
    {
        // ログイン中のユーザー情報取得
        $user = Auth::user();

        // そのユーザーの体重ログと目標体重を取得
        $weightLogs = WeightLog::where('user_id', $user->id)->get();
        $target = WeightTarget::where('user_id', $user->id)->first();

        // ビューへデータを渡す
        return view('weights.index', compact('user', 'weightLogs', 'target'));
    }

    /**
     * 目標体重変更画面の表示
     */
    public function edit()
    {
        $user = Auth::user();
        $target = WeightTarget::where('user_id', $user->id)->first();

        return view('weights.edit', compact('target'));
    }

    /**
     * 目標体重の更新処理
     */
    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => ['required', 'numeric', 'min:0'],
        ]);

        $user = Auth::user();
        $target = WeightTarget::where('user_id', $user->id)->first();

        if ($target) {
            $target->target_weight = $request->target_weight;
            $target->save();
        }

        return redirect()->route('weights.index')->with('success', '目標体重を更新しました！');
    }
}

