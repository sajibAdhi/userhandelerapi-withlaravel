<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSignupTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_signup_successfully(): void
    {
        $response = $this->postJson('/api/users', [
            'name' => 'Test User',
            'email' => 'email@example.com',
            'password' => 'password',
            'division' => 'A'
        ]);

        $response->assertStatus(201);

        $response->assertJsonFragment([
            'name' => 'Test User',
            'email' => 'email@example.com'
        ]);

        $response = $this->postJson('/api/users', [
            'name' => 'Test User',
            'email' => 'email@example.com',
            'password' => 'password',
            'division' => 'A'
        ]);

        $response->assertStatus(422);
    }

    public function test_user_signup_failed_with_invalid_email(): void
    {
        $response = $this->postJson('/api/users', [
            'name' => 'Test User',
            'email' => 'email',
            'password' => 'password',
            'division' => 'A'
        ]);

        $response->assertStatus(422);
    }
}
