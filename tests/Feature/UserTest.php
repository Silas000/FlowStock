<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_users_index(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($admin)->get('/users');
        
        $response->assertStatus(200);
    }

    public function test_funcionario_cannot_view_users_index(): void
    {
        $funcionario = User::factory()->create(['role' => 'funcionario']);
        
        $response = $this->actingAs($funcionario)->get('/users');
        
        $response->assertStatus(403);
    }
}