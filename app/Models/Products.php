<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Products
 * @package App\Models
 */
class Products extends Model
{
    /**
     * Types.
     */
    public const TYPE_PIZZA = 0;
    public const TYPE_COMBO = 1;
    public const TYPE_DESSERTS = 2;
    public const TYPE_DRINKS = 3;
    public const TYPE_PROMOTIONS = 4;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function image(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Images::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Tags::class, 'tag_to_products', 'product_id', 'tag_id')
            ->withPivot('product_id');
    }
}
