<?php

namespace App\Services\Interfaces\Auth;

use App\Http\Requests\Auth\PasswordResetLinkStoreRequest;
use Illuminate\Http\JsonResponse;

interface IPasswordResetLink
{
    public function create(): JsonResponse;

    public function store(PasswordResetLinkStoreRequest $request): JsonResponse;
}
