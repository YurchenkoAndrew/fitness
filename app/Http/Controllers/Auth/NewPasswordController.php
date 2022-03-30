<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Auth\INewPassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    private \App\Services\Contracts\Auth\INewPassword $newPasswordService;

    public function __construct(INewPassword $newPasswordService)
    {
        $this->newPasswordService = $newPasswordService;
    }

    public function create(Request $request): JsonResponse
    {
        return $this->newPasswordService->create($request);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);
        return $this->newPasswordService->store($request);
    }
}
