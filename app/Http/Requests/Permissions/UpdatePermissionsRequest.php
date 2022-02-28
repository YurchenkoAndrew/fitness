<?php

namespace App\Http\Requests\Permissions;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdatePermissionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['title_ru' => "string", 'title_en' => "string", 'user_id' => "string"])]
    public function rules(): array
    {
        return [
            'title_ru' => 'required|string|min:2|max:100',
            'title_en' => 'required|string|min:2|max:100',
            'user_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'title_ru.required' => __('permissions.title_ru_required'),
            'title_en.required' => __('permissions.title_en_required'),
            'title_ru.string' => __('permissions.title_ru_string'),
            'title_en.string' => __('permissions.title_en_string'),
            'title_ru.min' => __('permissions.title_ru_min'),
            'title_en.min' => __('permissions.title_en_min'),
            'title_ru.max' => __('permissions.title_ru_max'),
            'title_en.max' => __('permissions.title_en_max'),
            'user_id.required' => __('permissions.user_id_required'),
            'user_id.integer' => __('permissions.user_id_integer'),
        ];
    }
}
