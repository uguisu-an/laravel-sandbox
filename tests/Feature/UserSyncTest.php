<?php

namespace Tests\Feature;

use App\Product;
use App\UpdateSequenceNumber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSyncTest extends TestCase
{
    // TODO フルシンクとインクリメンタルシンクでテストケース分けてもいいかも
    // TODO productsが取れる
    // TODO product_backlogsが取れる
    // TODO full_sync_beforeが取れる
    // TODO update_countが取れる
    // TODO last_sync_timeを送れる
    // TODO last_update_countを送れる
    // TODO full_sync_beforeがlast_sync_timeより後ならフルシンクする
    // TODO それ以外はインクリメントシンクする
    // TODO last_update_countとupdate_countが同じなら何も返さない
    // TODO last_update_countがupdate_countよりも小さければlast_update_countより後のデータだけを返す

    use RefreshDatabase;

    public function test_成功すると商品が返ってくる()
    {
        $response = $this->sync();

        $response->assertOk()->assertJson([
            'products' => $this->products->toArray(),
        ]);
    }

    public function test_手元のデータが最新なら何も返ってこない()
    {
        $response = $this->sync([
            'last_update_count' => 1,
        ]);

        $response->assertOk()->assertExactJson([
            'products' => []
        ]);
    }

    public function test_更新があればその分だけ返ってくる()
    {
        $product = factory(Product::class)->create(['update_count' => 2]);

        $response = $this->sync([
            'last_update_count' => 1,
        ]);

        $response->assertOk()->assertExactJson([
            'products' => [$product->toArray()]
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->products = factory(Product::class, 3)->create(['update_count' => 1]);
    }

    protected function sync($params = [])
    {
        return $this->json('get', route('sync', $params));
    }
}
