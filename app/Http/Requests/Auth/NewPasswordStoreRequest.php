<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class NewPasswordStoreRequest extends FormRequest
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
    #[ArrayShape(['token' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    #[ArrayShape(['token.required' => "mixed", 'token.string' => "mixed", 'email.required' => "mixed", 'email.email' => "mixed", 'password.required' => "mixed", 'password.min' => "mixed", 'password.string' => "mixed", 'password.confirmed' => "mixed"])]
    public function messages(): array
    {
        return [
            'token.required' => __('validation.required', ['attribute_en' => 'Token', 'attribute_ru' => 'Токен', 'attribute_kz' => 'Төкен']),
            'token.string' => __('validation.string', ['attribute_en' => 'Token', 'attribute_ru' => 'Токен', 'attribute_kz' => 'Төкен']),

            'email.required' => __('validation.required', ['attribute_en' => 'Email', 'attribute_ru' => 'Email', 'attribute_kz' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),

            'password.required' => __('validation.required', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз']),
            'password.min' => __('validation.min.string', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз', 'min' => '8']),
            'password.string' => __('validation.string', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз']),
            'password.confirmed' => __('validation.confirmed', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароля', 'attribute_kz' => 'Құпия сөз']),
        ];
    }
}
