<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class OrderHistoryTest
 * @package Tests\Feature
 */
class OrderHistoryTest extends TestCase
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

        $this->json('POST', 'api/order/store', [
            'client' => [
                'phone' => '79198748190',
                'name' => 'Dmitry Shpachenko',
                'address' => 'Test address',
            ],
            'store' => [$product->id => 1]
        ]);

        $response = $this->json('POST','api/order/history', [
            'phone' => '79198748190'
        ]);

        $response
            ->assertStatus(200)
            //->assertSee(json_encode(['name' => $product->name]))
            ->assertSee($product->name)
        ;
    }
}
