<?php

namespace App\Repositories\Interfaces;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

/**
 *
 */
interface IBaseRepository
{
    /**
     * @param mixed $pipes
     * @return JsonResponse
     */
    public function all(mixed $pipes): JsonResponse;

    /**
     * @param mixed $pipes
     * @param int $perPage
     * @return JsonResponse
     */
    public function paginate(mixed $pipes, int $perPage): JsonResponse;

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse;

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
