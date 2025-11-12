<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_access_register_form(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function guest_can_submit_register_form(): void
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);

        $response->assertRedirect('/')
            ->assertSessionHasNoErrors();
    }
}
