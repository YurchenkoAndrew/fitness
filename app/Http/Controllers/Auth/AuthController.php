<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\IAuthUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResendEmailVerifyRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private IAuthUser $authUserService;

    public function __construct(IAuthUser $authUserService)
    {
        $this->authUserService = $authUserService;
    }

    public function register(RegisterRequest $registerRequest): JsonResponse
    {
        return $this->authUserService->register($registerRequest->validated());
    }

    public function verify(int $id, Request $request): JsonResponse
    {
        return $this->authUserService->emailVerification($id, $request);
    }

    public function resend(ResendEmailVerifyRequest $emailVerifyRequest): JsonResponse
    {
        return $this->authUserService->resendEmailVerify($emailVerifyRequest->validated());
    }
}
