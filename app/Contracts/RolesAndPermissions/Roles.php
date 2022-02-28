<?php

namespace App\Contracts\RolesAndPermissions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

interface Roles
{
    public function listRoles(): JsonResponse;

    public function shouRole(int $id): JsonResponse;

    public function storeRole(FormRequest $request): JsonResponse;

    public function updateRole(FormRequest $request, int $id): JsonResponse;

    public function deleteRole(int $id): JsonResponse;
}
