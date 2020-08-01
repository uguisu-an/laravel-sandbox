<?php

namespace Tests\Feature;

use App\Product;
use App\UpdateSequenceNumber;
use Tests\TestCase;
use App\Usecases\UserUpdateProductUsecase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 利用者として、商品を更新できる
 */
class UserUpdateProductTest extends TestCase
{

    use RefreshDatabase;

    public function test_商品を更新する()
    {
        $this->updateProduct();

        $this->assertDatabaseHas('products', [
            'name' => $this->new_product->name,
            'update_count' => 2,
        ]);
    }

    public function test_USNをインクリメントする()
    {
        $this->updateProduct();

        $this->assertDatabaseHas('update_sequence_numbers', [
            'update_count' => 2,
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        UpdateSequenceNumber::create(['update_count' => 1]);
        $this->old_product = factory(Product::class)->create([
            'update_count' => 1,
        ]);
        $this->new_product = factory(Product::class)->make();
    }

    protected function updateProduct()
    {
        (new UserUpdateProductUsecase())($this->old_product->id, $this->new_product->name);
    }
}
