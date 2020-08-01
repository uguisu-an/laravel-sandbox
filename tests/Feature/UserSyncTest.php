<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSyncTest extends TestCase
{
    // TODO 成功すると200
    // TODO フルシンクとインクリメンタルシンクでテストケース分けてもいいかも
    // TODO productsが取れる
    // TODO product_backlogsが取れる
    // TODO last_full_syncが取れる
    // TODO update_countが取れる

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
