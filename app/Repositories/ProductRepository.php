<?php

namespace App\Repositories;

use App\Models\Products;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository extends Repository
{
    /**
     * Model name.
     *
     * @return mixed|string
     */
    function model(): string
    {
        return Products::class;
    }
}
