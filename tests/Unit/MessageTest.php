<?php

namespace Tests\Unit;

use App\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_初期値を設定する()
    {
        $message = new Message();

        $message->save();

        $this->assertEquals('', $message->body);
    }

    public function test_nullを受け取っても空文字を返すようにする()
    {
        $message = new Message(['body' => null]);

        $message->save();

        $this->assertTrue($message->body === '');
    }
}
