<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // 登録フォームを表示
    public function create()
    {
        return view('register');
    }

    // 登録処理
    public function store(RegisterRequest $request)
    {
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'アカウントを作成しました！');
    }
}
