<?php

namespace App\Services\Interfaces\RolesAndPermissions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

interface IPermissions
{
    public function listPermissions(): JsonResponse;

    public function shouPermission(int $id): JsonResponse;

    public function storePermission(FormRequest $request): JsonResponse;

    public function updatePermission(FormRequest $request, int $id): JsonResponse;

    public function deletePermission(int $id): JsonResponse;
}
