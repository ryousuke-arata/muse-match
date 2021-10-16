<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'id' => 'required',
            'mail' => 'email',
            'pass' => 'required',
            'name' => 'required',
            //
        ];
    }

    public function messages()
    {
        return [
            'id.required' => '※IDが未入力です',
            'mail.email' => '※メールアドレスを入力してください',
            'pass.required' => '※パスワードを設定してください',
            'name.required' => '※名前を入力してください',
        ];
    }
}
