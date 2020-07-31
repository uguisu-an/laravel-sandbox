<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequiredValidationTest extends TestCase
{
    public function test_Success()
    {
        $response = $this->exec([
            'value' => 'value',
        ]);

        $response->assertOk()->assertExactJson(['value']);
    }

    public function test_requiredが与えられてない時()
    {
        $response = $this->exec();

        $response->assertJsonValidationErrors('value');
    }

    public function test_requiredに空文字の時()
    {
        $response = $this->exec([
            'value' => '',
        ]);

        $response->assertJsonValidationErrors('value');
    }

    public function test_requiredがnullの時()
    {
        $response = $this->exec([
            'value' => null,
        ]);

        $response->assertJsonValidationErrors('value');
    }

    protected function exec($params = [])
    {
        return $this->json('post', '/api/test/required', $params);
    }
}
