<?php

namespace App\Http\Controllers\RolesAndPermissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permissions\StorePermissionsRequest;
use App\Http\Requests\Permissions\UpdatePermissionsRequest;
use App\Services\Interfaces\RolesAndPermissions\IPermissions;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class PermissionsController extends Controller
{
    /**
     * @var IPermissions
     */
    protected IPermissions $service;

    /**
     * @param IPermissions $service
     */
    public function __construct(IPermissions $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->service->listPermissions();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermissionsRequest $request
     * @return JsonResponse
     */
    public function store(StorePermissionsRequest $request): JsonResponse
    {
        return $this->service->storePermission($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->service->shouPermission($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionsRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdatePermissionsRequest $request, int $id): JsonResponse
    {
        return $this->service->updatePermission($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->service->deletePermission($id);
    }
}
