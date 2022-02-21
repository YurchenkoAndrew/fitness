<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

/**
 *
 */
interface IBaseRepository
{
    /**
     * @param mixed $filters
     * @return Collection
     */
    public function all(mixed $filters): Collection;

    /**
     * @param mixed $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(mixed $filters, int $perPage): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Model|null
     */
    public function show(int $id): ?Model;

    /**
     * @param mixed $data
     * @return JsonResponse
     */
    public function create(mixed $data): JsonResponse;

    /**
     * @param mixed $data
     * @param int $id
     * @return JsonResponse
     */
    public function update(mixed $data, int $id): JsonResponse;

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse;

}
