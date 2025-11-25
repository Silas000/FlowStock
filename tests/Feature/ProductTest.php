<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_product(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($admin)->post('/products', [
            'name' => 'Novo Produto',
            'description' => 'Descrição do produto',
            'price' => 100.50,
        ]);
        
        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', ['name' => 'Novo Produto']);
    }
}