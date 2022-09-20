<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ArticleCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description'       => 'required|string|min:10|max:999',
        ];
    }

    public function attributes()
    {
        return [
            'description'       => 'Комментарий',
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
            'string'                => 'Неверный формат данных',
            'min'                   => 'Поле ":attribute" не должно быть меньше :min символов',
            'max'                   => 'Поле ":attribute" не должно превышать :max символов',
        ];
    }
}
