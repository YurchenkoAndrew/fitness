<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class EmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (!hash_equals((string)$this->route('id'),
            (string)$this->user()->getKey())) {
            return false;
        }

        if (!hash_equals((string)$this->route('hash'),
            sha1($this->user()->getEmailForVerification()))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['id' => "string", 'hash' => "string"])]
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'hash' => 'required|string',
        ];
    }
}
