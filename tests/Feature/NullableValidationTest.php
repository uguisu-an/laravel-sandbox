<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NullableValidationTest extends TestCase
{
    public function test_Success()
    {
        $response = $this->exec([
            'nullable' => 'value',
        ]);

        $response->assertOk()->assertExactJson(['value']);
    }


    public function test_nullableに空文字の時()
    {
        $response = $this->exec([
            'nullable' => '',
        ]);

        $response->assertOk()->assertExactJson([null]);
    }

    public function test_nullableが与えられてない時()
    {
        $response = $this->exec();

        $response->assertOk()->assertExactJson(['unset']);
    }

    public function test_nullableがnullの時()
    {
        $response = $this->exec([
            'nullable' => null,
        ]);

        $response->assertOk()->assertExactJson([null]);
    }

    protected function exec($params = [])
    {
        return $this->json('post', '/api/test/nullable', $params);
    }
}
