<?php

namespace App\Services\RolesAndPermissions;

use App\Contracts\RolesAndPermissions\Roles;
use App\Pipes\QueryFilters\OrderBy;
use App\Repositories\Interfaces\RolesAndPermissions\IRolesRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class RolesService implements Roles
{
    protected IRolesRepository $repository;

    /**
     * @param IRolesRepository $repository
     */
    public function __construct(IRolesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listRoles(): JsonResponse
    {
        return $this->repository->all([OrderBy::class]);
    }

    public function shouRole(int $id): JsonResponse
    {
        return $this->repository->show($id);
    }

    public function storeRole(FormRequest $request): JsonResponse
    {
        return $this->repository->create($request);
    }

    public function updateRole(FormRequest $request, int $id): JsonResponse
    {
        return $this->repository->update($request, $id);
    }

    public function deleteRole(int $id): JsonResponse
    {
        return $this->repository->delete($id);
    }
}
