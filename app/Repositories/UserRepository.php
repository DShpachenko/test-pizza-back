<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends Repository
{
    /**
     * Model name.
     *
     * @return mixed|string
     */
    function model(): string
    {
        return User::class;
    }
}
