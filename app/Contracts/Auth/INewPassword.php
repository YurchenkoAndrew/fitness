<?php

namespace App\Contracts\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface INewPassword
{
    public function create(Request $request): JsonResponse;

    public function store(Request $request): JsonResponse;
}
