<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 *
 */
class RegisterRequest extends FormRequest
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
    #[ArrayShape(['name' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8|string|confirmed'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute_en' => 'User Name', 'attribute_ru' => 'Имя пользователя', 'attribute_kz' => 'Пайдаланушы аты']),
            'name.min' => __('validation.min.string', ['attribute_en' => 'User Name', 'attribute_ru' => 'Имя пользователя', 'attribute_kz' => 'Пайдаланушы аты', 'min' => 3]),
            'name.max' => __('validation.max.string', ['attribute_en' => 'User Name', 'attribute_ru' => 'Имя пользователя', 'attribute_kz' => 'Пайдаланушы аты', 'max' => 20]),

            'email.required' => __('validation.required', ['attribute_en' => 'Email', 'attribute_ru' => 'Email', 'attribute_kz' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),
            'email.unique' => __('validation.unique', ['attribute' => 'Email']),

            'password.required' => __('validation.required', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз']),
            'password.min' => __('validation.min.string', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз', 'min' => '8']),
            'password.string' => __('validation.string', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароль', 'attribute_kz' => 'Құпия сөз']),
            'password.confirmed' => __('validation.confirmed', ['attribute_en' => 'Password', 'attribute_ru' => 'Пароля', 'attribute_kz' => 'Құпия сөз']),
        ];
    }
}
