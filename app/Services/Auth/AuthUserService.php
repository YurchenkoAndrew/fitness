<?php

namespace App\Services\Auth;

use App\Contracts\Auth\IAuthUser;
use App\DAO\Interfaces\Auth\IAuthRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class AuthUserService implements IAuthUser
{
    /**
     * @var IAuthRepository
     */
    protected IAuthRepository $authRepository;

    /**
     * @param IAuthRepository $authRepository
     */
    public function __construct(IAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function register(mixed $user): JsonResponse
    {
        return $this->authRepository->register($user);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        return $this->authRepository->login($request);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function emailVerification(int $id, Request $request): JsonResponse
    {
        if (!$request->hasValidSignature()) {
            return response()->json(['message' => __('register.token_not_valid')], Response::HTTP_BAD_GATEWAY);
        }
        $user = $this->authRepository->isUserById($id);
        if ($user == null) {
            return response()->json(['message' => __('passwords.user')], Response::HTTP_NOT_FOUND);
        }
        auth()->login($user);
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(['message' => __('register.email_already_verified')], Response::HTTP_ACCEPTED);
        }
        if (!auth()->user()->hasVerifiedEmail()) {
            auth()->user()->markEmailAsVerified();
        }
        auth()->logout();
        return response()->json(['message' => __('register.email_verified')], Response::HTTP_OK);
    }

    /**
     * @param string $email
     * @return JsonResponse
     */
    public function resendEmailVerify(string $email): JsonResponse
    {
        $user = $this->authRepository->isUserByEmail($email);
        if ($user == null) {
            return response()->json(['message' => __('passwords.user')], Response::HTTP_NOT_FOUND);
        }
        auth()->login($user);
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(['message' => __('register.email_already_verified')], Response::HTTP_ACCEPTED);
        }

        auth()->user()->sendEmailVerificationNotification();
        auth()->logout();

        return response()->json(['message' => __('register.resend_ok')], Response::HTTP_OK);
    }
}
