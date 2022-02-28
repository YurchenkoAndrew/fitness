<?php

namespace App\Contracts\RolesAndPermissions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

interface Roles
{
    public function listRoles(): Collection;

    public function shouRole(int $id): ?Model;

    public function storeRole(FormRequest $request): JsonResponse;

    public function updateRole(FormRequest $request, int $id): JsonResponse;

    public function deleteRole(int $id): JsonResponse;
}
