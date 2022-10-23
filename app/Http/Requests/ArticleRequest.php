<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
            'name'              => 'required|min:5|max:100',
            'short_description' => 'required|max:100',
            'description'       => 'required',
            'url'               => 'required|unique:articles,url,' . $this->id
        ];
    }

    public function attributes()
    {
        return [
            'name'              => 'Название',
            'short_description' => 'Краткое описание',
            'description'       => 'Статья',
            'url'               => 'Адрес статьи'
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
            'max'                   => 'Поле ":attribute" не должно превышать :max символов',
            'unique'                => 'Данное значение уже используется',
        ];
    }
}
