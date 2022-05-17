<?php

namespace App\Http\Requests\Role;

use App\Contracts\Constants\Permissions;
use App\Helpers\Interfaces\ICheckingPermissionsForRole;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RoleSetPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param ICheckingPermissionsForRole $checkingPermissionsForRole
     * @return Response|bool
     */
    public function authorize(ICheckingPermissionsForRole $checkingPermissionsForRole): Response|bool
    {
        return $checkingPermissionsForRole->isPermission(auth('api')->user()->role_id, Permissions::SET_PERMISSION);
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
