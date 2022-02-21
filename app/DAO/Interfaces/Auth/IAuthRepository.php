<?php

namespace App\DAO\Interfaces\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IAuthRepository
{
    public function register(FormRequest $user): JsonResponse;

    public function login(Request $request): JsonResponse;

    public function isUserById(int $id): User|null;

    public function isUserByEmail(string $email): User|null;
}
