<?php

namespace App\Repositories\DAO;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 *
 */
class UserRepository extends BaseRepository implements IUserRepository
{

    /**
     * @inheritDoc
     */
    public function model(): Model
    {
        return new User();

    }

    /**
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        try {
            $data = $this->model->query()->findOrFail($id)->with('role')->first();
        } catch (Exception $exception) {
            throw new HttpException($exception->getCode(), $exception->getMessage());
        }
        return $data;
    }
}
