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
            'title_ru.required' => __('validation.required', ['attribute_en' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском", 'attribute_kz' => 'Орыс тіліндегі рұқсат атауы']),
            'title_en.required' => __('validation.required', ['attribute_en' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском", 'attribute_kz' => 'Ағылшын тіліндегі рұқсат атауы']),

            'title_ru.string' => __('validation.string', ['attribute_en' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском", 'attribute_kz' => 'Орыс тіліндегі рұқсат атауы']),
            'title_en.string' => __('validation.string', ['attribute_en' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском", 'attribute_kz' => 'Ағылшын тіліндегі рұқсат атауы']),

            'title_ru.min' => __('validation.min.string', ['attribute_en' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском", 'attribute_kz' => 'Орыс тіліндегі рұқсат атауы', 'min' => '2']),
            'title_en.min' => __('validation.min.string', ['attribute_en' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском", 'attribute_kz' => 'Ағылшын тіліндегі рұқсат атауы', 'min' => '2']),

            'title_ru.max' => __('validation.max.string', ['attribute_en' => "Permission name in Russian", 'attribute_ru' => "Название разрешения на Русском", 'attribute_kz' => 'Орыс тіліндегі рұқсат атауы', 'max' => '255']),
            'title_en.max' => __('validation.max.string', ['attribute_en' => "Permission name in English", 'attribute_ru' => "Название разрешения на Английском", 'attribute_kz' => 'Ағылшын тіліндегі рұқсат атауы', 'max' => '255']),


            'slug.required' => __('validation.required', ['attribute_en' => "Permission alias", 'attribute_ru' => "Алиас разрешения", 'attribute_kz' => 'Рұқсат бүркеншік аты']),

            'slug.string' => __('validation.string', ['attribute_en' => "Permission alias", 'attribute_ru' => "Алиас разрешения", 'attribute_kz' => 'Рұқсат бүркеншік аты']),

            'slug.min' => __('validation.min.string', ['attribute_en' => "Permission alias", 'attribute_ru' => "Алиас разрешения", 'attribute_kz' => 'Рұқсат бүркеншік аты', 'min' => '2']),

            'slug.max' => __('validation.max.string', ['attribute' => "Permission alias", 'attribute_ru' => "Алиас разрешения", 'attribute_kz' => 'Рұқсат бүркеншік аты', 'max' => '255']),
        ];
    }
}
