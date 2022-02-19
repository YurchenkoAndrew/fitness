<?php

namespace App\Contracts\Auth;

use App\Http\Requests\Auth\NewPasswordCreateRequest;
use App\Http\Requests\Auth\NewPasswordStoreRequest;
use Illuminate\Http\JsonResponse;

interface INewPassword
{
    public function create(NewPasswordCreateRequest $request): JsonResponse;

    public function store(NewPasswordStoreRequest $request): JsonResponse;
}
