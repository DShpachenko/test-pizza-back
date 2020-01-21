<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * Class OrderIndexTest
 * @package Tests\Feature
 */
class OrderIndexTest extends TestCase
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
        $response = $this->json('GET','api/products');

        $response
            ->assertStatus(200)
            //->assertSee(json_encode(['name' => $product->name]))
            ->assertSee($product->name)
        ;
    }
}
