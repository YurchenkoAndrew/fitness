<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

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

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name', 'attribute_ru' => 'Имя']),
            'name.min' => __('validation.min.string', ['attribute' => 'Name', 'attribute_ru' => 'Имя', 'min' => 3]),
            'name.max' => __('validation.max.string', ['attribute' => 'Name', 'attribute_ru' => 'Имя', 'max' => 20]),

            'email.required' => __('validation.required', ['attribute' => 'Email', 'attribute_ru' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),
            'email.unique' => __('validation.unique', ['attribute' => 'Email']),

            'password.required' => __('validation.required', ['attribute' => 'Password', 'attribute_ru' => 'Пароль']),
            'password.min' => __('validation.min', ['attribute' => 'Password', 'attribute_ru' => 'Пароль']),
            'password.string' => __('validation.string', ['attribute' => 'Password', 'attribute_ru' => 'Пароль']),
            'password.confirmed' => __('validation.confirmed', ['attribute' => 'Password', 'attribute_ru' => 'Пароля']),
        ];
    }
}
