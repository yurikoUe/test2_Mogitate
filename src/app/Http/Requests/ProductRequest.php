<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric|min:1|max:10000',
            'seasons' => 'nullable', // seasons[] は配列なのでこのように設定
            'image' => 'nullable|mimes:jpeg,png|file',
            'description' => 'required|max:120',
        ];

        // 更新時（PUTリクエスト）で画像や季節が選択されていない場合でも元々のデータを保持する
        if ($this->isMethod('put')) {
            // 画像が選択されていない場合でも元の画像を保持する
            if (!$this->hasFile('image') && !$this->input('current_image')) {
                $rules['image'] = 'required|mimes:jpeg,png|file'; // 画像が選ばれていない場合、必須にする
            }

            // 季節が選ばれていない場合でも元の季節を保持する
            if (empty($this->input('seasons'))) {
                $rules['seasons'] = 'required|array'; // seasons[] が空ならエラー
            }
        }

        return $rules;
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
