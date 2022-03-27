<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * @group one
     * 
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
