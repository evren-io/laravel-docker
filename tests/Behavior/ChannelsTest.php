<?php

namespace Tests\Behavior;

use Tests\TestCase;

class ChannelsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/channels');

        $response->assertStatus(200);

        $response->assertSee('Channels');
    }
}
