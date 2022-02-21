<?php

namespace App\Repositories\DAO;

use App\Models\User;
use App\Repositories\Interfaces\ITestRepository;

class TestRepository extends BaseRepository implements ITestRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return User::class;
    }

    public function testMethod(mixed $data): void
    {
        // TODO: Implement testMethod() method.
    }
}
