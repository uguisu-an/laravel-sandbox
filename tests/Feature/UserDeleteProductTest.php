<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use App\UpdateSequenceNumber;
use App\Usecases\UserDeleteProductUsecase;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * 利用者として、商品を削除できる
 */
class UserDeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_商品を追加する()
    {
        $now = now();
        Carbon::setTestNow($now);

        $this->deleteProduct();

        $this->assertDatabaseHas('products', [
            'name' => $this->product->name,
            'update_count' => 2,
            'deleted_at' => $now,
        ]);
    }

    public function test_USNをインクリメントする()
    {
        $this->deleteProduct();

        $this->assertDatabaseHas('update_sequence_numbers', [
            'update_count' => 2,
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        UpdateSequenceNumber::create(['update_count' => 1]);
        $this->product = factory(Product::class)->create(['update_count' => 1]);
    }

    protected function deleteProduct()
    {
        (new UserDeleteProductUsecase())($this->product->id);
    }
}
