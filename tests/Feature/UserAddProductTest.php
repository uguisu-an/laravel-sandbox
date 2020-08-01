<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use App\Usecases\UserAddProductUsecase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 利用者として、商品を追加できる
 */
class UserAddProductTest extends TestCase
{
    use RefreshDatabase;

    // TODO UpdateSequenceNumberが更新される

    public function test_商品を追加する()
    {
        $this->addProduct();

        $this->assertDatabaseHas('products', [
            'name' => $this->product->name,
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->product = factory(Product::class)->make();
    }

    protected function addProduct()
    {
        (new UserAddProductUsecase())($this->product->name);
    }
}
