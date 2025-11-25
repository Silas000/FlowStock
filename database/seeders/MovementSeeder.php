<?php

namespace Database\Seeders;

use App\Models\Movement;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    public function run(): void
    {
        // Limpar movimentações existentes para evitar duplicatas
        Movement::query()->delete();

        $products = Product::all();
        $funcionarios = User::where('role', 'funcionario')->get();

        if ($products->isEmpty() || $funcionarios->isEmpty()) {
            $this->command->error('Não há produtos ou funcionários para criar movimentações!');
            return;
        }

        $movementTypes = ['entrada', 'saida'];
        $notes = [
            'Entrada de estoque inicial',
            'Reposição de estoque',
            'Compra do fornecedor',
            'Venda para cliente',
            'Ajuste de inventário',
            'Devolução de cliente',
            'Transferência entre filiais',
            'Promoção especial',
            'Pedido online',
            'Atendimento balcão'
        ];

        // Criar movimentações para cada produto
        foreach ($products as $product) {
            $initialQuantity = 0;
            
            // Criar 3-5 movimentações por produto
            $movementCount = rand(3, 5);
            
            for ($i = 0; $i < $movementCount; $i++) {
                $type = $movementTypes[array_rand($movementTypes)];
                $quantity = rand(1, 20);
                $user = $funcionarios->random();
                
                // Garantir que não haja saída maior que o estoque disponível
                if ($type === 'saida' && $initialQuantity < $quantity) {
                    $type = 'entrada';
                }
                
                // Atualizar quantidade inicial
                if ($type === 'entrada') {
                    $initialQuantity += $quantity;
                } else {
                    $initialQuantity -= $quantity;
                }

                Movement::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'type' => $type,
                    'quantity' => $quantity,
                    'notes' => $notes[array_rand($notes)] . ' - ' . $product->name,
                    'photo_path' => null, // Opcional: adicionar fotos posteriormente
                    'created_at' => now()->subDays(rand(1, 30)),
                ]);
            }

            // Atualizar a quantidade final do produto
            $product->update(['quantity' => $initialQuantity]);
        }

        $this->command->info('Movements seeded successfully!');
        $this->command->info('Total movements created: ' . Movement::count());
    }
}