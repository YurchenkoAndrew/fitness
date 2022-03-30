<?php

namespace App\Services\Implementation\RolesAndPermissions;

use App\Pipes\QueryFilters\OrderBy;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;
use App\Services\Contracts\RolesAndPermissions\IRoles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
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
        $data = $this->repository->all([OrderBy::class]);
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function shouRole(int $id): JsonResponse
    {
        $data = $this->repository->show($id);
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
