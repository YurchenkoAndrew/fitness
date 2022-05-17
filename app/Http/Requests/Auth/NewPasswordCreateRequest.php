<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class NewPasswordCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
//        if (! hash_equals((string) $this->route('hash'),
//            sha1($this->user()->getEmailForVerification()))) {
//            return false;
//        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['token' => "string"])]
    public function rules(): array
    {
        return [
            'token' => 'required|string',
        ];
    }

    #[ArrayShape(['token.required' => "mixed", 'token.string' => "mixed"])]
    public function messages(): array
    {
        return [
            'token.required' => __('validation.required', ['attribute_en' => 'Token', 'attribute_ru' => 'Токен', 'attribute_kz' => 'Төкен']),
            'token.string' => __('validation.string', ['attribute_en' => 'Token', 'attribute_ru' => 'Токен', 'attribute_kz' => 'Төкен']),
        ];
    }
}
