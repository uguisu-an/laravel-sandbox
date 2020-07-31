<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilledValidationTest extends TestCase
{
    public function test_Success()
    {
        $response = $this->postExample([
            'filled' => 'value',
        ]);

        $response->assertOk()->assertExactJson(['value']);
    }

    public function test_filledが与えられてない時()
    {
        $response = $this->postExample();

        $response->assertOk()->assertExactJson(['unset']);
    }

    public function test_filledに空文字の時()
    {
        $response = $this->postExample([
            'filled' => '',
        ]);

        $response->assertJsonValidationErrors('filled');
    }

    public function test_filledがnullの時()
    {
        $response = $this->postExample([
            'filled' => null,
        ]);

        $response->assertJsonValidationErrors('filled');
    }

    public function postExample($params = [])
    {
        return $this->json('post', '/api/test/filled', $params);
    }
}
