<?php

use App\Models\Products;
use App\Models\Images;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $this->createItems(Products::TYPE_PIZZA, 'pizza', 9);
        $this->createItems(Products::TYPE_COMBO, 'combo', 3);
        $this->createItems(Products::TYPE_DESSERTS, 'dessert', 3);
        $this->createItems(Products::TYPE_DRINKS, 'drink', 3);
        $this->createItems(Products::TYPE_PROMOTIONS, 'promo', 1);
    }

    private function createItems($productType, $imgName, $count)
    {
        for ($i = 1; $i <= $count; $i++) {
            $value = random_int(25, 40);

            $product = Products::create([
                'name' => 'Pizza_'.$i,
                'type' => $productType,
                'description' => 'Pizza is a savory dish of Italian origin, consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients.',
                'by_prescription' => 'Ernest Hemingway',
                'from' => '2020-01-13 00:00:00',
                'to' => '2020-01-18 00:00:00',
                'cost_eur' => $value + 3,
                'cost_usd' => $value,
            ]);

            DB::table('images')->insert([
                'product_id' => $product->id,
                'link' => $imgName . '-'. $i .'.jpg',
            ]);

            DB::table('tag_to_products')->insert([
                'tag_id' => random_int(1, 3),
                'product_id' => $product->id,
            ]);
        }
    }
}
