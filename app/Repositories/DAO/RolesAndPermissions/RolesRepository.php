<?php

namespace App\Repositories\DAO\RolesAndPermissions;

use App\Models\RoleAndPermission\Role;
use App\Repositories\DAO\BaseRepository;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 *
 */
class RolesRepository extends BaseRepository implements IRolesRepository
{

    /**
     * @inheritDoc
     */
    public function model(): Model
    {
        return new Role();
    }

    /**
     * @param Role $role
     * @param int $permission_id
     * @return JsonResponse
     */
    public function setPermission(Model $role, int $permission_id): JsonResponse
    {
        DB::beginTransaction();
        try {
            if ($role->permissions()->find($permission_id)) {
                return response()->json(['error' => __('permissions.already_exists')], Response::HTTP_ALREADY_REPORTED);
            }
            $role->permissions()->attach($permission_id);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
        return response()->json(['message' => __('permissions.add')], Response::HTTP_CREATED);
    }

    /**
     * @param Role $role
     * @param int $permission_id
     * @return JsonResponse
     */
    public function deletePermission(Model $role, int $permission_id): JsonResponse
    {
        DB::beginTransaction();
        try {
            if (!$role->permissions()->find($permission_id)) {
                return response()->json(['error' => __('permissions.not_found')], Response::HTTP_NOT_FOUND);
            }
            $role->permissions()->detach($permission_id);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
        return response()->json(['message' => __('permissions.delete')], Response::HTTP_OK);
    }
}
