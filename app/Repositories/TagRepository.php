<?php

namespace App\Repositories;

use App\Models\Tags;

/**
 * Class TagRepository
 * @package App\Repositories
 */
class TagRepository extends Repository
{
    /**
     * Model name.
     *
     * @return mixed|string
     */
    function model(): string
    {
        return Tags::class;
    }
}
