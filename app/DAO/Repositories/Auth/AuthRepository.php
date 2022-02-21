<?php

namespace App\DAO\Repositories\Auth;

use App\DAO\Interfaces\Auth\IAuthRepository;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthRepository implements IAuthRepository
{

    public function register(mixed $user): JsonResponse
    {
        $user = User::query()->create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password'])
        ]);
        event(new Registered($user));
        return response()->json(['message' => __('register.registered')], Response::HTTP_CREATED);
    }

    public function login(Request $request): JsonResponse
    {
        $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'scope' => '',
        ]);
        return response()->json(['token' => $response->json()], Response::HTTP_OK);
    }

    public function isUserById(int $id): User|null
    {
        return User::query()->where('id', $id)->firstOr(function () {
            return null;
        });
    }

    public function isUserByEmail(string $email): User|null
    {
        return User::query()->where('email', $email)->firstOr(function () {
            return null;
        });
    }
}
