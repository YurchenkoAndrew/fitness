<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Security\UsersRequests\UserPaginateRequest;
use App\Http\Requests\Security\UsersRequests\UserUpdateRequest;
use App\Services\Contracts\IUserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    protected IUserService $service;

    /**
     * @param IUserService $service
     */
    public function __construct(IUserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->service->listUsers();
    }


    public function paginateUser(UserPaginateRequest $request): JsonResponse
    {
        return $this->service->listUsersPaginate($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function store(RegisterRequest $request): JsonResponse
    {
        return $this->service->storeUser($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->service->showUser($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        return $this->service->updateUser($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->service->deleteUser($id);
    }
}
