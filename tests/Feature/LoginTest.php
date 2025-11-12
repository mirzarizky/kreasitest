<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_login_form(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_can_login(): void
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/')
            ->assertSessionHasNoErrors();
    }

    public function test_user_submit_login_form_has_errors(): void
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password-salah',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_user_cannot_access_login_form(): void
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/login');

        $response->assertRedirect('/');
    }

    /** @test */
    public function guest_can_access_login_form(): void
    {
        $response = $this->get('/login');

        $response->assertOk('/');
    }
}
