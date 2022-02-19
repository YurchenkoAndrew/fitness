<?php

namespace App\Services\Auth;

use App\Contracts\Auth\IAuthUser;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResendEmailVerifyRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthUserService implements IAuthUser
{

    public function register(RegisterRequest $registerRequest): JsonResponse
    {
        $user = User::query()->create([
            'name' => $registerRequest['name'],
            'email' => $registerRequest['email'],
            'password' => Hash::make($registerRequest['password'])
        ]);
        event(new Registered($user));
        return response()->json(['message' => __('register.registered')], Response::HTTP_CREATED);
    }

    public function login(AuthRequest $authRequest): JsonResponse
    {
        $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'username' => $authRequest->input('username'),
            'password' => $authRequest->input('password'),
            'scope' => '',
        ]);
        return response()->json(['tokenResponse' => $response->json()], Response::HTTP_OK);
    }

    public function emailVerification(int $id, Request $request): JsonResponse
    {
        if (!$request->hasValidSignature()) {
            return response()->json(['message' => __('register.token_not_valid')], Response::HTTP_BAD_GATEWAY);
        }
        $user = User::query()->where('id', $id)->firstOr(function () {
            return null;
        });
        auth()->login($user);
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(['message' => __('register.email_already_verified')], Response::HTTP_ACCEPTED);
        }
        if (!auth()->user()->hasVerifiedEmail()) {
            auth()->user()->markEmailAsVerified();
        }
        if ($user == null) {
            return response()->json(['message' => __('passwords.user')], Response::HTTP_NOT_FOUND);
        }
        auth()->logout();
        return response()->json(['message' => __('register.email_verified')], Response::HTTP_OK);
    }

    public function resendEmailVerify(ResendEmailVerifyRequest $emailVerifyRequest): JsonResponse
    {
        $user = User::query()->where('email', $emailVerifyRequest->input('email'))->firstOr(function () {
            return null;
        });
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
