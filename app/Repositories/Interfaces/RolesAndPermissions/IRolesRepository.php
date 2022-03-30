<?php

namespace App\Repositories\Interfaces\RolesAndPermissions;

use App\Models\RoleAndPermission\Role;
use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

/**
 *
 */
interface IRolesRepository extends IBaseRepository
{
    /**
     * @param Role $role
     * @param int $permission_id
     * @return JsonResponse
     */
    public function setPermission(Model $role, int $permission_id): JsonResponse;

    /**
     * @param Role $role
     * @param int $permission_id
     * @return JsonResponse
     */
    public function deletePermission(Model $role, int $permission_id): JsonResponse;
}
