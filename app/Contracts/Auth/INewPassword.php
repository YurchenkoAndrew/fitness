<?php

namespace App\Contracts\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

interface INewPassword
{
    public function create(string $token): JsonResponse;

    public function store(FormRequest $request): JsonResponse;
}
