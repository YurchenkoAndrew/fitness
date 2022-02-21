<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\INewPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewPasswordCreateRequest;
use App\Http\Requests\Auth\NewPasswordStoreRequest;
use Illuminate\Http\JsonResponse;

class NewPasswordController extends Controller
{
    private INewPassword $newPasswordService;

    public function __construct(INewPassword $newPasswordService)
    {
        $this->newPasswordService = $newPasswordService;
    }

    public function create(NewPasswordCreateRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return $this->newPasswordService->create($validated['token']);
    }

    public function store(NewPasswordStoreRequest $request): JsonResponse
    {
        return $this->newPasswordService->store($request);
    }
}
