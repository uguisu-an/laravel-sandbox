<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidationPracticeTest extends TestCase
{
    public function test_Success()
    {
        $response = $this->postExample([
            'filled' => 'filled',
        ]);

        $response->assertOk();
    }

    public function test_filledに空文字の時()
    {
        $response = $this->postExample([
            'filled' => '',
        ]);

        $response->assertJsonValidationErrors('filled');
    }

    public function postExample($params = [])
    {
        return $this->json('post', '/api/test', $params);
    }
}
