<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_successfully_with_valid_data(): void
    {

        $admin = Admin::factory()->create();

        $response = $this->postJson('/api/admins/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }

    public function test_admin_login_failed_with_invalid_data(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->postJson('/api/admins/login', [
            'email' => $admin->email,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(422);
    }
}
