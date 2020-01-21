<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ProductCollection
 * @package App\Http\Resources
 */
class ProductCollection extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'by_prescription' => $item->by_prescription,
                'type' => $item->type,
                'cost' => [
                    'eur' => $item->cost_eur,
                    'usd' => $item->cost_usd,
                ],
                'img' => 'img/'. ($item->image->first()->link ?? ''),
                'tags' => new TagCollection($item->tags),
                'from' => Carbon::parse($item->from)->format('d.m.Y'),
                'to' => Carbon::parse($item->to)->format('d.m.Y'),
            ];
        });
    }
}
