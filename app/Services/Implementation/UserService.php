<?php

namespace App\Services\Implementation;

use App\Pipes\QueryFilters\OrderBy;
use App\Pipes\QueryFilters\SelectByRole;
use App\Repositories\Interfaces\IUserRepository;
use App\Services\Interfaces\IUserService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserService implements IUserService
{
    protected IUserRepository $repository;

    /**
     * @param IUserRepository $repository
     */
    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listUsers(): JsonResponse
    {
        return response()->json(['data' => $this->repository->all([OrderBy::class])], Response::HTTP_OK);
    }

    public function listUsersPaginate(FormRequest $request): JsonResponse
    {
        return response()->json(['data' => $this->repository->paginate([OrderBy::class, SelectByRole::class], $request)], Response::HTTP_OK);
    }

    public function showUser(int $userId): JsonResponse
    {
        return response()->json(['data' => $this->repository->show($userId)], Response::HTTP_OK);
    }

    public function storeUser(FormRequest $request): JsonResponse
    {
        $data = $this->repository->store($request);
        return response()->json(['data' => $data], Response::HTTP_CREATED);
    }

    public function updateUser(FormRequest $request, int $userId): JsonResponse
    {
        return $this->repository->update($request, $userId);
    }

    public function deleteUser(int $userId): JsonResponse
    {
        return $this->repository->delete($userId);
    }
}
