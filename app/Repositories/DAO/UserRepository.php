<?php

namespace App\Repositories\DAO;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Model;

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
}
