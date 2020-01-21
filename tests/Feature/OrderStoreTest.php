<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class OrderStoreTest
 * @package Tests\Feature
 */
class OrderStoreTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $product = factory(\App\Models\Products::class)->create();

        $response = $this->json('POST', 'api/order/store', [
            'client' => [
                'phone' => '79198748190',
                'name' => 'Dmitry Shpachenko',
                'address' => 'Test address',
            ],
            'store' => [$product->id => 1]
        ]);

        $response
            ->assertStatus(200)
            ->assertJson(['status' => 'ok'])
        ;
    }
}
