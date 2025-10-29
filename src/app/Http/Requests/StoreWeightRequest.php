<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Q1: 全ユーザーが利用できるようにする（true / false）
        return true;
    }

    public function rules(): array
    {
        return [
            // Q2: 日付は必須＆日付形式
            'date' => [
                'required', // 必須
                'date',     // 日付
               ],


            // Q3: 体重は必須・数値・4桁以内・小数1桁まで
            'weight' => [
                'required', // 必須
                'numeric', // 数値
                'max:9999.9', // 正規表現で4桁以内・小数1桁
            ],

            // Q4: 摂取カロリーは必須・数値
                'calorie' => [
                'required',
                'numeric',
            ],

            // Q5: 運動時間は必須
                'exercise_time' => [
                'required',
            ],

            // Q6: 運動内容は任意・文字列・最大120文字
                'exercise_content' => [
                'nullable',
                'string',
                'max:120',
            ],
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
        'weight.max'      => '4桁までの数字で入力してください',        // 小数点1桁のチェックはregex使わない方針だから、別メッセージ不要

        // 摂取カロリー
        'calorie.required' => '摂取カロリーを入力してください',
        'calorie.numeric'  => '数字で入力してください',

        // 運動時間
        'exercise_time.required' => '運動時間を入力してください',

        // 運動内容
        'exercise_content.max' => '120文字以内で入力してください',
    ];
}

