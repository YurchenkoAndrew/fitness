<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResendEmailVerifyRequest;
use App\Services\Contracts\Auth\IAuthUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private IAuthUser $authUserService;

    public function __construct(\App\Services\Contracts\Auth\IAuthUser $authUserService)
    {
        $this->authUserService = $authUserService;
    }

    public function register(RegisterRequest $registerRequest): JsonResponse
    {
        return $this->authUserService->register($registerRequest);
    }

    public function verify(int $id, Request $request): JsonResponse
    {
        return $this->authUserService->emailVerification($id, $request);
    }

    public function resend(ResendEmailVerifyRequest $emailVerifyRequest): JsonResponse
    {
        $validated = $emailVerifyRequest->validated();
        return $this->authUserService->resendEmailVerify($validated['email']);
    }

    public function login(Request $request): JsonResponse
    {
        return $this->authUserService->login($request);
    }
}
