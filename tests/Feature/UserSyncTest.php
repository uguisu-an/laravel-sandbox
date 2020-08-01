<?php

namespace Tests\Feature;

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

    public function test_成功するとOKが返ってくる()
    {
        $response = $this->sync();

        $response->assertOk();
    }

    protected function sync()
    {
        return $this->json('get', route('sync'));
    }
}
