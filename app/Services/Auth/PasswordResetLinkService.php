<?php

namespace App\Services\Auth;

use App\Contracts\Auth\IPasswordResetLink;
use App\Http\Requests\Auth\PasswordResetLinkStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;

class PasswordResetLinkService implements IPasswordResetLink
{

    public function create(): JsonResponse
    {
        return response()->json(['message' => __('passwords.sent')], Response::HTTP_OK);
    }

    public function store(PasswordResetLinkStoreRequest $request): JsonResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? response()->json(['message' => __('passwords.sent')], Response::HTTP_OK)
            : response()->json(['message' => __('passwords.user')], Response::HTTP_BAD_REQUEST);
    }
}
