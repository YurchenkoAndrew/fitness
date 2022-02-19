<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\IPasswordResetLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordResetLinkStoreRequest;
use Illuminate\Http\JsonResponse;

class PasswordResetLinkController extends Controller
{
    private IPasswordResetLink $passwordResetLinkService;

    public function __construct(IPasswordResetLink $passwordResetLink)
    {
        $this->passwordResetLinkService = $passwordResetLink;
    }

    public function create(): JsonResponse
    {
        return $this->passwordResetLinkService->create();
    }

    protected function store(PasswordResetLinkStoreRequest $request): JsonResponse
    {
        return $this->passwordResetLinkService->store($request);
    }
}
