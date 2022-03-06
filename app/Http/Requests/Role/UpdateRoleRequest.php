<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 *
 */
class UpdateRoleRequest extends FormRequest
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
    #[ArrayShape(['title_ru' => "string", 'title_en' => "string", 'user_id' => "string"])] public
    function rules(): array
    {
        return [
            'title_ru' => 'required|string|min:2|max:255',
            'title_en' => 'required|string|min:2|max:255',
            'user_id' => 'required|integer'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title_ru.required' => __('validation.required', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском"]),
            'title_en.required' => __('validation.required', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском"]),

            'title_ru.string' => __('validation.string', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском"]),
            'title_en.string' => __('validation.string', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском"]),

            'title_ru.min' => __('validation.min.string', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'min' => '2']),
            'title_en.min' => __('validation.min.string', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'min' => '2']),

            'title_ru.max' => __('validation.max.string', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'max' => '255']),
            'title_en.max' => __('validation.max.string', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'max' => '255']),

            'user_id.required' => __('validation.required', ['attribute' => "User ID", 'attribute_ru' => "Идентификатор пользователя"]),
            'user_id.integer' => __('validation.integer', ['attribute' => 'User ID', 'attribute_ru' => 'Идентификатор пользователя'])
        ];
    }
}
