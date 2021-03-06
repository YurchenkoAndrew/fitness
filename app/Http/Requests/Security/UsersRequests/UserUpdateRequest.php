<?php

namespace App\Http\Requests\Security\UsersRequests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 *
 */
class UserUpdateRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['name' => "string", 'email' => "string", 'role' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'role' => 'nullable|string|alpha',
        ];
    }

    /**
     * @return array
     */
    #[ArrayShape(['name.required' => "mixed", 'name.min' => "mixed", 'name.max' => "mixed", 'email.required' => "mixed", 'email.email' => "mixed", 'role.string' => "mixed", 'role.alfa' => "mixed"])]
    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute_en' => 'User Name', 'attribute_ru' => 'Имя пользователя', 'attribute_kz' => 'Пайдаланушы аты']),
            'name.min' => __('validation.min.string', ['attribute_en' => 'User Name', 'attribute_ru' => 'Имя пользователя', 'attribute_kz' => 'Пайдаланушы аты', 'min' => 3]),
            'name.max' => __('validation.max.string', ['attribute_en' => 'User Name', 'attribute_ru' => 'Имя пользователя', 'attribute_kz' => 'Пайдаланушы аты', 'max' => 20]),

            'email.required' => __('validation.required', ['attribute_en' => 'Email', 'attribute_ru' => 'Email', 'attribute_kz' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),

            'role.string' => __('validation.string', ['attribute_en' => 'Role', 'attribute_ru' => 'Роль', 'attribute_kz' => 'Рөл']),
            'role.alfa' => __('validation.alpha', ['attribute' => 'Role', 'attribute_ru' => 'Роль', 'attribute_kz' => 'Рөл']),
        ];
    }
}
