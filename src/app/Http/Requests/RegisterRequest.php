<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric|min:1|max:10000',
            'seasons' => 'required',
            'image' => 'required|mimes:jpeg,png|file',
            'description' => 'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '値段は数値で入力してください',
            'price.min' => '値段は0円以上、10000円以内で入力してください',
            'price.max' => '値段は0円以上、10000円以内で入力してください',
            'seasons.required' => '季節を選択してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '画像は.pngまたは.jpeg形式でアップロードしてください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '商品説明は120文字以内で入力してください',
        ];
    }
}
