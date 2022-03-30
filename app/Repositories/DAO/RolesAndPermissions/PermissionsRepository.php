<?php

namespace App\Repositories\DAO\RolesAndPermissions;

use App\Models\RoleAndPermission\Permissions;
use App\Repositories\DAO\BaseRepository;
use App\Repositories\Interfaces\RolesAndPermissions\IPermissionsRepository;
use Illuminate\Database\Eloquent\Model;

class PermissionsRepository extends BaseRepository implements IPermissionsRepository
{

    /**
     * @inheritDoc
     */
    public function model(): Model
    {
        return new Permissions();
    }
}
