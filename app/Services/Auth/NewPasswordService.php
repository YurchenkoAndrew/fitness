<?php

namespace App\Services\Auth;

use App\Contracts\Auth\INewPassword;
use App\Http\Requests\Auth\NewPasswordCreateRequest;
use App\Http\Requests\Auth\NewPasswordStoreRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class NewPasswordService implements INewPassword
{

    public function create(NewPasswordCreateRequest $request): JsonResponse
    {
        return response()->json(['token' => $request['token']], Response::HTTP_OK);
    }

    public function store(NewPasswordStoreRequest $request): JsonResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status == Password::PASSWORD_RESET
            ? response()->json(['message' => __('passwords.changed')], Response::HTTP_OK)
            : response()->json(['message' => __('passwords.user')], Response::HTTP_BAD_REQUEST);
    }
}
