<?php

namespace App\Helpers\Implementations;

use App\Helpers\Interfaces\ICheckingPermissionsForRole;
use App\Models\RoleAndPermission\Permission;
use App\Models\RoleAndPermission\Role;
use Exception;
use Illuminate\Auth\Access\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 *
 */
class CheckingPermissionsForRole implements ICheckingPermissionsForRole
{

    /**
     * @inheritDoc
     */
    public function isPermission(int $role_id, int $permission_id): Response
    {
        try {
            $role = Role::with('permissions')->findOrFail($role_id);
            /** @var Permission $permission */
            foreach ($role['permissions'] as $permission) {
                if ($permission->id === $permission_id) {
                    return Response::allow();
                }
            }
            return Response::deny(__('permissions.access_is_denied'));
        } catch (Exception $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
    }
}
