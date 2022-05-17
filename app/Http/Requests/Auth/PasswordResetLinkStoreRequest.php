<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PasswordResetLinkStoreRequest extends FormRequest
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
    #[ArrayShape(['email' => "string"])]
    public function rules(): array
    {
        return [
            'email' => 'required|email',
        ];
    }

    #[ArrayShape(['email.required' => "mixed", 'email.email' => "mixed"])]
    public function messages(): array
    {
        return [
            'email.required' => __('validation.required', ['attribute_en' => 'Email', 'attribute_ru' => 'Email', 'attribute_kz' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email'])
        ];
    }
}
