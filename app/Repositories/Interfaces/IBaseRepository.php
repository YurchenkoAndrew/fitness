<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

/**
 *
 */
interface IBaseRepository
{
    /**
     * @param mixed $pipes
     * @return Collection
     */
    public function all(mixed $pipes): Collection;

    /**
     * @param mixed $pipes
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(mixed $pipes, int $perPage): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Model|null
     */
    public function show(int $id): ?Model;

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function create(FormRequest $request): JsonResponse;

    /**
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(FormRequest $request, int $id): JsonResponse;

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse;

}
