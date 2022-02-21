<?php

namespace App\Contracts\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IAuthUser
{
    public function register(FormRequest $user): JsonResponse;

    public function login(Request $request): JsonResponse;

    public function emailVerification(int $id, Request $request): JsonResponse;

    public function resendEmailVerify(string $email): JsonResponse;
}
