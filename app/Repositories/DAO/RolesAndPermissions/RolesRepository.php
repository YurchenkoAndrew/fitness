<?php

namespace App\Repositories\DAO\RolesAndPermissions;

use App\Models\RoleAndPermission\Role;
use App\Repositories\DAO\BaseRepository;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;

class RolesRepository extends BaseRepository implements IRolesRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return Role::class;
    }
}
