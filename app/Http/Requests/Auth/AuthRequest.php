<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['username' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'username' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    #[ArrayShape(['username.required' => "string", 'username.email' => "string", 'password.required' => "string", 'password.min' => "string"])]
    public function messages(): array
    {
        return [
            'username.required' => __('validation.required', ['attribute_en' => 'Email', 'attribute_ru' => 'Email', 'attribute_kz' => 'Email']),
            'username.email' => __('validation.email', ['attribute' => 'Email']),
            'password.required' => __('validation.required', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз']),
            'password.min' => __('validation.min.string', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз', 'min' => '8']),
        ];
    }
}
