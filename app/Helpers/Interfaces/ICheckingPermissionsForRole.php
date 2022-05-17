<?php

namespace App\Helpers\Interfaces;

use Illuminate\Auth\Access\Response;

/**
 *
 */
interface ICheckingPermissionsForRole
{
    /**
     * @param int $role_id
     * @param int $permission_id
     * @return Response
     */
    public function isPermission(int $role_id, int $permission_id): Response;
}
