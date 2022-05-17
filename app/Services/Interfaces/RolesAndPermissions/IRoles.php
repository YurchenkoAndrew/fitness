<?php

namespace App\Services\Interfaces\RolesAndPermissions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

interface IRoles
{
    public function listRoles(): JsonResponse;

    public function shouRole(int $id): JsonResponse;

    public function storeRole(FormRequest $request): JsonResponse;

    public function editRole(int $id): JsonResponse;

    public function updateRole(FormRequest $request, int $id): JsonResponse;

    public function deleteRole(int $id): JsonResponse;

    public function setPermission(FormRequest $request): JsonResponse;

    public function deletePermission(FormRequest $request): JsonResponse;
}
