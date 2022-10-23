<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'email'             => 'required|email:rfc,dns',
            'message'           => 'required|min:5|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'email'             => 'Email',
            'message'           => 'Ваша сообщение'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'              => 'Поле ":attribute" обязательно для заполнения',
            'min'                   => 'Поле ":attribute" не должно быть меньше :min символов',
            'max'                   => 'Поле "Название" не должно превышать :max символов',
            'email'                 => 'Данная почта не валидна',
        ];
    }
}
