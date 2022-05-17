<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Str;

/**
 *
 * @property string $slug
 * @property string $title_ru
 * @property string $title_en
 */
class StoreRoleRequest extends FormRequest
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
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::upper(Str::slug($this->title_en)),
        ]);
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
//            'slug' => 'required|string|min:2|max:255',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title_ru.required' => __('validation.required', ['attribute_en' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'attribute_kz' => "Орыс тілінде рөл аты"]),
            'title_en.required' => __('validation.required', ['attribute_en' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'attribute_kz' => "Ағылшын тіліндегі рөл атауы"]),
            'slug.required' => __('validation.required', ['attribute_en' => "Role alias", 'attribute_ru' => "Алиас роли", 'attribute_kz' => "Рөл бүркеншік аты"]),

            'title_ru.string' => __('validation.string', ['attribute_en' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'attribute_kz' => "Орыс тілінде рөл аты"]),
            'title_en.string' => __('validation.string', ['attribute_en' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'attribute_kz' => "Ағылшын тіліндегі рөл атауы"]),
            'slug.string' => __('validation.string', ['attribute_en' => "Role alias", 'attribute_ru' => "Алиас роли", 'attribute_kz' => "Рөл бүркеншік аты"]),

            'title_ru.min' => __('validation.min.string', ['attribute_en' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'attribute_kz' => "Орыс тілінде рөл аты", 'min' => '2']),
            'title_en.min' => __('validation.min.string', ['attribute_en' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'attribute_kz' => "Ағылшын тіліндегі рөл атауы", 'min' => '2']),
            'slug.min' => __('validation.min.string', ['attribute_en' => "Role alias", 'attribute_ru' => "Алиас роли", 'attribute_kz' => "Рөл бүркеншік аты", 'min' => '2']),

            'title_ru.max' => __('validation.max.string', ['attribute_en' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'attribute_kz' => "Орыс тілінде рөл аты", 'max' => '255']),
            'title_en.max' => __('validation.max.string', ['attribute_en' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'attribute_kz' => "Ағылшын тіліндегі рөл атауы", 'max' => '255']),
            'slug.max' => __('validation.max.string', ['attribute_en' => "Role alias", 'attribute_ru' => "Алиас роли", 'attribute_kz' => "Рөл бүркеншік аты", 'max' => '255']),
        ];
    }
}
