<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Q1: 全ユーザーが利用できるようにする（true / false）
        return true;
    }

    public function rules(): array
    {
        return [
            // Q2: メールアドレス（必須・形式チェック）
            'email' => [
                'required', // 必須
                'email', // メール形式
            ],

            // Q3: パスワード（必須）
            'password' => [
                'required', // 必須
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'メールアドレス', */
            'password' => 'パスワード', */
        ];
    }

    public function messages(): array
    {
        return [
            // メールアドレス
            'email.required' => 'メールアドレスを入力してください', */
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください', */

            // パスワード
            'password.required' => 'パスワードを入力してください', */
        ];
    }
}
