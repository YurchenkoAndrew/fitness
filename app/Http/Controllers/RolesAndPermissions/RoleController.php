<?php

namespace App\Http\Controllers\RolesAndPermissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleSetPermissionRequest;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\RoleAndPermission\Role;
use App\Services\Implementation\RolesAndPermissions\RolesService;
use App\Services\Interfaces\RolesAndPermissions\IRoles;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class RoleController extends Controller
{
    /**
     * @var RolesService
     */
    protected IRoles $service;

    /**
     * @param RolesService $service
     */
    public function __construct(RolesService $service)
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Role::class, 'role');
        $this->service = $service;
    }

    /**
     * @return array|string[]
     */
    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'setPermission' => 'setPermission',
            'deletePermission' => 'deletePermission'
        ]);
    }

    /**
     * @return array|string[]
     */
    protected function resourceMethodsWithoutModels()
    {
        return array_merge(parent::resourceMethodsWithoutModels(), [
            'setPermission',
            'deletePermission',
            'edit',
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
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
     * @param Role $role
     * @return JsonResponse
     */
    public function show(Role $role): JsonResponse
    {
        return $this->service->shouRole($role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        return $this->service->editRole($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return JsonResponse
     */
    public function update(UpdateRoleRequest $request, Role $role): JsonResponse
    {
        return $this->service->updateRole($request, $role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        return $this->service->deleteRole($role->id);
    }

    /**
     * @param RoleSetPermissionRequest $request
     * @return JsonResponse
     */
    public function setPermission(RoleSetPermissionRequest $request): JsonResponse
    {
        return $this->service->setPermission($request);
    }

    /**
     * @param RoleSetPermissionRequest $request
     * @return JsonResponse
     */
    public function deletePermission(RoleSetPermissionRequest $request): JsonResponse
    {
        return $this->service->deletePermission($request);
    }
}
