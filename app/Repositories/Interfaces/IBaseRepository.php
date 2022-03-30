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
     * @param array $pipes
     * @return Collection
     */
    public function all(array $pipes): Collection;

    /**
     * @param array $pipes
     * @param FormRequest $request
     * @return LengthAwarePaginator
     */
    public function paginate(array $pipes, FormRequest $request): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model;

    /**
     * @param FormRequest $request
     * @return Model
     */
    public function store(FormRequest $request): Model;

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
