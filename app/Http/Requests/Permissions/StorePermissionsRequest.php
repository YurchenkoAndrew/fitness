<?php

namespace App\Http\Requests\Permissions;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StorePermissionsRequest extends FormRequest
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
    #[ArrayShape(['title_ru' => "string", 'title_en' => "string", 'slug' => "string"])]
    public function rules(): array
    {
        return [
            'title_ru' => 'required|string|min:2|max:255',
            'title_en' => 'required|string|min:2|max:255',
            'slug' => 'required|string|min:2|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title_ru.required' => __('validation.required', ['attribute' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском"]),
            'title_en.required' => __('validation.required', ['attribute' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском"]),
            'slug.required' => __('validation.required', ['attribute' => "Permission alias", 'attribute_ru' => "Алиас разрешения"]),

            'title_ru.string' => __('validation.string', ['attribute' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском"]),
            'title_en.string' => __('validation.string', ['attribute' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском"]),
            'slug.string' => __('validation.string', ['attribute' => "Permission alias", 'attribute_ru' => "Алиас разрешения"]),

            'title_ru.min' => __('validation.min.string', ['attribute' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском", 'min' => '2']),
            'title_en.min' => __('validation.min.string', ['attribute' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском", 'min' => '2']),
            'slug.min' => __('validation.min.string', ['attribute' => "Permission alias", 'attribute_ru' => "Алиас разрешения", 'min' => '2']),

            'title_ru.max' => __('validation.max.string', ['attribute' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском", 'max' => '255']),
            'title_en.max' => __('validation.max.string', ['attribute' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском", 'max' => '255']),
            'slug.max' => __('validation.max.string', ['attribute' => "Permission alias", 'attribute_ru' => "Алиас разрешения", 'max' => '255']),
        ];
    }
}
