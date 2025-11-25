<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Movement;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Estatísticas principais (otimizadas)
        $stats = $this->getDashboardStats();
        
        // Últimas movimentações
        $recentMovements = Movement::with(['product', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentMovements'));
    }

    private function getDashboardStats(): array
    {
        // Buscar todos os produtos uma vez só
        $products = Product::all();
        
        // Movimentações de hoje
        $todayMovements = Movement::whereDate('created_at', today())->get();

        return [
            // Estatísticas de produtos
            'total_products' => $products->count(),
            'products_with_stock' => $products->where('quantity', '>', 0)->count(),
            'low_stock_count' => $products->where('quantity', '<', 10)->where('quantity', '>', 0)->count(),
            'out_of_stock_count' => $products->where('quantity', 0)->count(),
            
            // Movimentações
            'today_movements_count' => $todayMovements->count(),
            'today_entradas' => $todayMovements->where('type', 'entrada')->count(),
            'today_saidas' => $todayMovements->where('type', 'saida')->count(),
            
            // Estatísticas admin (se necessário)
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
            'funcionario_users' => User::where('role', 'funcionario')->count(),
            'total_movements' => Movement::count(),
            'entrada_movements' => Movement::where('type', 'entrada')->count(),
            'saida_movements' => Movement::where('type', 'saida')->count(),
            'total_stock_value' => $products->sum(fn($product) => $product->quantity * $product->price),
        ];
    }
}