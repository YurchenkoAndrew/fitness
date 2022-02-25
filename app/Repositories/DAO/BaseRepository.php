<?php

namespace App\Repositories\DAO;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Pipeline\Pipeline;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
abstract class BaseRepository implements IBaseRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @return mixed
     */
    abstract public function model(): mixed;

    /**
     *
     */
    public function __construct()
    {
        $this->model = $this->model();
    }

    /**
     * @param mixed $filters
     * @return Collection
     */
    public function all(mixed $filters): Collection
    {
        $result = $this->model->query();

        $result = app(Pipeline::class)
            ->send($result)
            ->through($filters)
            ->thenReturn();

        return $result->get();

    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function paginate(mixed $filters, int $perPage): LengthAwarePaginator
    {
        $result = $this->model->query();

        $result = app(Pipeline::class)
            ->send($result)
            ->through($filters)
            ->thenReturn();

        return $result->paginate(request()->get($perPage));

    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function show(int $id): ?Model
    {
        return $this->model->query()->find($id);
    }

    /**
     * @param mixed $data
     * @return JsonResponse
     */
    public function create(mixed $data): JsonResponse
    {
        $this->model->query()->create($data);

        return response()->json(['message' => __('base-crud.create')], Response::HTTP_CREATED);
    }

    /**
     * @param mixed $data
     * @param int $id
     * @return JsonResponse
     */
    public function update(mixed $data, int $id): JsonResponse
    {
        $this->model->query()->find($id)->update($data);

        return response()->json(['message' => __('base-crud.update')], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->model->query()->find($id)->delete();

        return response()->json(['message' => __('base-crud.delete')], Response::HTTP_OK);

    }
}
