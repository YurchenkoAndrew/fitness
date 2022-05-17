<?php

namespace App\Services\Implementation\RolesAndPermissions;

use App\Http\Resources\Role\RoleEnResource;
use App\Http\Resources\Role\RoleRelationPermissionsEnResource;
use App\Http\Resources\Role\RoleRelationPermissionsRuResource;
use App\Http\Resources\Role\RoleRuResource;
use App\Pipes\QueryFilters\OrderBy;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;
use App\Services\Interfaces\RolesAndPermissions\IRoles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class RolesService implements IRoles
{
    /**
     * @var IRolesRepository
     */
    protected IRolesRepository $repository;

    /**
     * @param IRolesRepository $repository
     */
    public function __construct(IRolesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse
     */
    public function listRoles(): JsonResponse
    {
        $locale = App::currentLocale();
//        $data = $this->repository->all([OrderBy::class]);
        if ($locale === 'en') {
            $data = RoleEnResource::collection($this->repository->all([OrderBy::class]));
        } elseif ($locale === 'ru') {
            $data = RoleRuResource::collection($this->repository->all([OrderBy::class]));
        } else {
            $data = RoleRuResource::collection($this->repository->all([OrderBy::class]));
        }
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function shouRole(int $id): JsonResponse
    {
        $locale = App::currentLocale();
        if ($locale === 'en') {
            $data = new RoleRelationPermissionsEnResource($this->repository->show($id));
        } elseif ($locale === 'ru') {
            $data = new RoleRelationPermissionsRuResource($this->repository->show($id));
        } else {
            $data = new RoleRelationPermissionsRuResource($this->repository->show($id));
        }
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function storeRole(FormRequest $request): JsonResponse
    {
        $data = $this->repository->store($request);
        return response()->json(['data' => $data], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function editRole(int $id): JsonResponse
    {
        $data = $this->repository->show($id);
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    /**
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateRole(FormRequest $request, int $id): JsonResponse
    {
        return $this->repository->update($request, $id);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function deleteRole(int $id): JsonResponse
    {
        return $this->repository->delete($id);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function setPermission(FormRequest $request): JsonResponse
    {
        $role = $this->repository->show($request['role_id']);
        return $this->repository->setPermission($role, $request['permission_id']);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function deletePermission(FormRequest $request): JsonResponse
    {
        $role = $this->repository->show($request['role_id']);
        return $this->repository->deletePermission($role, $request['permission_id']);
    }
}
