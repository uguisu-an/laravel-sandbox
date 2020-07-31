<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SometimesValidationTest extends TestCase
{
    public function test_Success()
    {
        $response = $this->exec([
            'value' => 'sometimes',
        ]);

        $response->assertOk();
    }


    public function test_sometimesに空文字の時()
    {
        $response = $this->exec([
            'value' => '',
        ]);

        $response->assertOk();
    }

    public function test_sometimesが与えられてない時()
    {
        $response = $this->exec();

        $response->assertOk();
    }

    public function test_sometimesがnullの時()
    {
        $response = $this->exec([
            'value' => null,
        ]);

        $response->assertOk();
    }

    protected function exec($params = [])
    {
        return $this->json('post', '/api/test/sometimes', $params);
    }
}
