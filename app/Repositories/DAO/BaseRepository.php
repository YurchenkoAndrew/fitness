<?php

namespace App\Repositories\DAO;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
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
    abstract public function model(): string;

    /**
     *
     */
    public function __construct()
    {
        $this->model = $this->model();
    }

    /**
     * @param mixed $pipes
     * @return JsonResponse
     */
    public function all(mixed $pipes): JsonResponse
    {
        $result = $this->model->query();

        $result = app(Pipeline::class)
            ->send($result)
            ->through($pipes)
            ->thenReturn();

        return $result->get();

    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function paginate(mixed $pipes, int $perPage): JsonResponse
    {
        $result = $this->model->query();

        $result = app(Pipeline::class)
            ->send($result)
            ->through($pipes)
            ->thenReturn();

        return response()->json($result->paginate(request()->get($perPage)), Response::HTTP_OK);

    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json($this->model->query()->find($id), Response::HTTP_OK);
    }

    /**
     * @param FormRequest $request
     * @return JsonResponse
     */
    public function create(FormRequest $request): JsonResponse
    {
        $this->model->query()->create($request->validated());

        return response()->json(['message' => __('base-crud.create')], Response::HTTP_CREATED);
    }

    /**
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(FormRequest $request, int $id): JsonResponse
    {
        $this->model->query()->find($id)->update($request->validated());

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
