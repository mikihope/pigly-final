<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        // 全ユーザーが利用できるようにする
        return true;
    }

    public function rules(): array
    {
        return [
            // 日付（必須・日付形式）
            'date' => [
                'required',
                'date',
            ],

            // 体重（必須・数値・4桁以内・小数1桁）
            'weight' => [
                'required',
                'numeric',
                'max:300',
            ],

            // 摂取カロリー（必須・数値）
            'calorie' => [
                'required',
                'numeric',
            ],

            // 運動時間（必須）
            'exercise_time' => [
                'required',
            ],

            // 運動内容（任意・文字列・最大120文字）
            'exercise_content' => [
                'nullable',
                'string',
                'max:120',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
                'date' => '日付',
                'weight' => '体重',
                'calorie' => '摂取カロリー',
                'exercise_time' => '運動時間',
                'exercise_content' => '運動内容',
        ];
    }

    public function messages(): array
   {
    return [
        // 日付
        'date.required' => '日付を入力してください',

        // 体重
        'weight.required' => '体重を入力してください',
        'weight.numeric'  => '数字で入力してください',
        'weight.max'      => '4桁までの数字で入力してください',
        // 小数点1桁の指定はregexを使わない方針だから省略OK

        // 摂取カロリー
        'calorie.required' => '摂取カロリーを入力してください',
        'calorie.numeric'  => '数字で入力してください',

        // 運動時間
        'exercise_time.required' => '運動時間を入力してください',

        // 運動内容
        'exercise_content.max' => '120文字以内で入力してください',
            ];
     }

}
