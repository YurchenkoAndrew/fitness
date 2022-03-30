<?php

namespace App\Http\Requests\Security\UsersRequests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UserPaginateRequest extends FormRequest
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
    #[ArrayShape(['per_page' => "string", 'role' => "string", 'sort_by_field' => "string", 'sort_direction' => "string"])]
    public function rules(): array
    {
        return [
            'per_page' => 'required|int',
            'role' => 'nullable|string|alpha',
            'sort_by_field' => 'nullable|string|alpha',
            'sort_direction' => 'nullable|string|alpha',
        ];
    }
}
