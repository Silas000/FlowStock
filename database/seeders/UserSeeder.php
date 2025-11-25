<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrador',
                'email' => 'admin@stock.com',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'João Silva',
                'email' => 'joao@stock.com',
                'password' => 'password',
                'role' => 'funcionario',
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@stock.com',
                'password' => 'password',
                'role' => 'funcionario',
            ],
            [
                'name' => 'Carlos Oliveira',
                'email' => 'carlos@stock.com',
                'password' => 'password',
                'role' => 'funcionario',
            ],
            [
                'name' => 'Ana Costa',
                'email' => 'ana@stock.com',
                'password' => 'password',
                'role' => 'funcionario',
            ]
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make($userData['password']),
                    'role' => $userData['role'],
                    'email_verified_at' => now(),
                ]
            );
        }

        $this->command->info('Users seeded successfully!');
    }
}