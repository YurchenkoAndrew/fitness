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
            'username.required' => 'Email обязателен!',
            'username.email' => 'Email должен соответствовать формату user@domen.net',
            'password.required' => 'Пароль обязателен!',
            'password.min' => 'Пароль не может быть короче 8 символов!',
        ];
    }
}
