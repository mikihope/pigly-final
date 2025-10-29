<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTargetRequest extends FormRequest
{
    public function authorize(): bool
    {
        // 全ユーザーが利用できるようにする
        return true;
    }

    public function rules(): array
    {
        return [
            // 目標体重（必須・数値・4桁以内・小数1桁）
            'target_weight' => [
                'required',
                'numeric',
                'max:300', // 現実的な上限
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'target_weight' => '目標体重',
        ];
    }

    public function messages(): array
    {
        return [
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '4桁までの数字で入力してください',
            'target_weight.max' => '小数点は1桁で入力してください', */
        ];
    }
}

