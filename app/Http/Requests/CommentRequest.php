<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'text' => 'required|max:350',
        ];
    }

    /**
     * エラーメッセージを日本語化
     * 
     */
    public function messages()
    {
        return [
            
            'text.required' => 'コメント本文を入力してください',
            'text.max' => 'コメント本文は350文字以内で入力してください',
        ];
    }
}
