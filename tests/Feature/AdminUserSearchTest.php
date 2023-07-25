<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthorized_user_cannot_get_users_list(): void
    {
        User::factory()->create();

        $response = $this->getJson('/api/admins/users');

        $response->assertStatus(401);
    }

    public function test_admin_can_get_users_list(): void
    {
        $admin = Admin::factory()->create();
        User::factory(100)->create();

        $response = $this->actingAs($admin)->getJson('/api/admins/users');

        $response->assertStatus(200);
        $response->assertJsonCount(15, 'data');
    }
}
