<?php

namespace App\Contracts\Auth;

use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResendEmailVerifyRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IAuthUser
{
    public function register(RegisterRequest $registerRequest): JsonResponse;

    public function login(AuthRequest $authRequest): JsonResponse;

    public function emailVerification(int $id, Request $request): JsonResponse;

    public function resendEmailVerify(ResendEmailVerifyRequest $emailVerifyRequest): JsonResponse;
}
