<?php

namespace App\Repositories;

use App\Models\Orders;

/**
 * Class OrderRepository
 * @package App\Repositories
 */
class OrderRepository extends Repository
{
    /**
     * Model name.
     *
     * @return mixed|string
     */
    function model(): string
    {
        return Orders::class;
    }
}
