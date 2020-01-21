<?php

namespace App\Repositories\Traits;

/**
 * Trait Relation
 * @package App\Repositories\Traits
 */
trait Relation
{
    /**
     * @var array
     */
    public $relations = [];

    /**
     * @param null $relations
     */
    public function setRelations($relations = null)
    {
        $this->relations = $relations;
    }
}
