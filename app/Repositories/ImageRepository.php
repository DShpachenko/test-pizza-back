<?php

namespace App\Repositories;

use App\Models\Images;

/**
 * Class ImageRepository
 * @package App\Repositories
 */
class ImageRepository extends Repository
{
    /**
     * Model name.
     *
     * @return mixed|string
     */
    function model(): string
    {
        return Images::class;
    }
}
