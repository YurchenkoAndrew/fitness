<?php

namespace App\Repositories\DAO;

use App\Repositories\Interfaces\IBaseRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
    abstract public function model(): Model;

    /**
     *
     */
    public function __construct()
    {
        $this->model = $this->model();
    }

    /**
     * @param array $pipes
     * @return Collection
     */
    public function all(array $pipes): Collection
    {
        try {
            $result = $this->model->query();
            $result = app(Pipeline::class)
                ->send($result)
                ->through($pipes)
                ->thenReturn();
            return $result->get();
        } catch (Exception $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * @param array $pipes
     * @param FormRequest $request
     * @return LengthAwarePaginator
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function paginate(array $pipes, FormRequest $request): LengthAwarePaginator
    {
        try {
            $query = $this->model::query();
            $result = app(Pipeline::class)
                ->send($query)
                ->through($pipes)
                ->thenReturn();
            return $result->paginate($request->input(key: 'per_page'));
        } catch (Exception $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }

    }

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        try {
            $data = $this->model->query()->findOrFail($id);
        } catch (Exception $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
        return $data;
    }

    /**
     * @param FormRequest $request
     * @return Model
     */
    public function store(FormRequest $request): Model
    {
        DB::beginTransaction();
        try {
            $data = $this->model->query()->create($request->validated());
            DB::commit();

            return $data;
        } catch (Exception $exception) {
            DB::rollBack();
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * @param FormRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(FormRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->model->query()->find($id)->update($request->validated());
            DB::commit();
            return response()->json(['message' => __('base-crud.update')], Response::HTTP_OK);
        } catch (Exception $exception) {
            DB::rollBack();
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->model->query()->findOrFail($id)->delete();
            DB::commit();
            return response()->json(['message' => __('base-crud.delete')], Response::HTTP_OK);
        } catch (Exception $exception) {
            DB::rollBack();
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
    }

}
