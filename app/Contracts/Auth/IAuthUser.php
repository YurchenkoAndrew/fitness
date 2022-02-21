<?php

namespace App\Contracts\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IAuthUser
{
    public function register(Request $request): JsonResponse;

    public function login(Request $request): JsonResponse;

    public function emailVerification(int $id, Request $request): JsonResponse;

    public function resendEmailVerify(Request $request): JsonResponse;
}
