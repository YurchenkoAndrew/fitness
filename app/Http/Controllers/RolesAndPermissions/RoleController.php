<?php

namespace App\Http\Controllers\RolesAndPermissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Services\RolesAndPermissions\RolesService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    protected RolesService $service;

    public function __construct(RolesService $service)
    {
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->service->listRoles();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return JsonResponse
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        return $this->service->storeRole($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Model|null
     */
    public function show(int $id): ?Model
    {
        return $this->service->shouRole($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRoleRequest $request, int $id): JsonResponse
    {
        return $this->service->updateRole($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->service->deleteRole($id);
    }
}
