<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersCollection extends ResourceCollection
{
    /*
     id: 1,
                name: 'Dmitry Shpachenko',
                address: 'Client address',
                phone: '79198748190',
                created_at: '2020-01-18 12:00:00',
                total_sum_eur: 1234,
                total_sum_usd: 1200,
                items: [
                    {
                        id: 1,
                        name: "Don Bacon",
                        count: 3,
                    }
                ]
     */

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->user->name,
                'address' => $item->address,
                'phone' => $item->user->phone,
                'created_at' => $item->created_at,
                'total_sum_eur' => $item->total_sum_eur,
                'total_sum_usd' => $item->total_sum_usd,
                'items' => new OrderProductCollection($item->orderProducts),
            ];
        });
    }
}
