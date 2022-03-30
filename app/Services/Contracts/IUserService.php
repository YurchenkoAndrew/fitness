<?php

namespace App\Services\Contracts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

interface IUserService
{
    public function listUsers(): JsonResponse;

    public function listUsersPaginate(FormRequest $request): JsonResponse;

    public function showUser(int $userId): JsonResponse;

    public function storeUser(FormRequest $request): JsonResponse;

    public function updateUser(FormRequest $request, int $userId): JsonResponse;

    public function deleteUser(int $userId): JsonResponse;
}
