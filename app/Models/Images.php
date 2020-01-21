<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Images
 * @package App\Models
 */
class Images extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Products::class);
    }
}
