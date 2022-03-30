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
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title_en),
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
            'slug' => 'required|string|min:2|max:255',
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
            'slug.required' => __('validation.required', ['attribute' => "Role alias", 'attribute_ru' => "Алиас роли"]),

            'title_ru.string' => __('validation.string', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском"]),
            'title_en.string' => __('validation.string', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском"]),
            'slug.string' => __('validation.string', ['attribute' => "Role alias", 'attribute_ru' => "Алиас роли"]),

            'title_ru.min' => __('validation.min.string', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'min' => '2']),
            'title_en.min' => __('validation.min.string', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'min' => '2']),
            'slug.min' => __('validation.min.string', ['attribute' => "Role alias", 'attribute_ru' => "Алиас роли", 'min' => '2']),

            'title_ru.max' => __('validation.max.string', ['attribute' => "Role name in Russian", 'attribute_ru' => "Название роли на Русском", 'max' => '255']),
            'title_en.max' => __('validation.max.string', ['attribute' => "Role name in English", 'attribute_ru' => "Название роли на Английском", 'max' => '255']),
            'slug.max' => __('validation.max.string', ['attribute' => "Role alias", 'attribute_ru' => "Алиас роли", 'max' => '255']),
        ];
    }
}
