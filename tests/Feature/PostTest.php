<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_list_of_posts(): void
    {
        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
    }
}
