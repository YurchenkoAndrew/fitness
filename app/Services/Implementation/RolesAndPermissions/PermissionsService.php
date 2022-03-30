<?php

namespace App\Services\Implementation\RolesAndPermissions;

use App\Pipes\QueryFilters\OrderBy;
use App\Repositories\Interfaces\RolesAndPermissions\IPermissionsRepository;
use App\Services\Contracts\RolesAndPermissions\IPermissions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class PermissionsService implements IPermissions
{
    /**
     * @var IPermissionsRepository
     */
    protected IPermissionsRepository $repository;

    /**
     * @param IPermissionsRepository $repository
     */
    public function __construct(IPermissionsRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return JsonResponse
     */
    public function listPermissions(): JsonResponse
    {
        $data = $this->repository->all([OrderBy::class]);
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function shouPermission(int $id): JsonResponse
    {
        $data = $this->repository->show($id);
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function storePermission(FormRequest $request): JsonResponse
    {
        $data = $this->repository->store($request);
        return response()->json(['data' => $data], Response::HTTP_CREATED);
    }

    /**
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updatePermission(FormRequest $request, int $id): JsonResponse
    {
        return $this->repository->update($request, $id);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function deletePermission(int $id): JsonResponse
    {
        return $this->repository->delete($id);
    }
}
