<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RoleSetPermissionRequest extends FormRequest
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
    #[ArrayShape(['role_id' => "string", 'permission_id' => "string"])]
    public function rules(): array
    {
        return [
            'role_id' => 'required|int',
            'permission_id' => 'required|int'
        ];
    }
}
