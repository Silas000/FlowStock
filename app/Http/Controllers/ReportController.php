<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Movement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function stock(Request $request): View
    {
        $query = Product::query();

        // Filtro por busca
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filtro por quantidade mínima
        if ($request->has('min_quantity') && $request->min_quantity !== null) {
            $query->where('quantity', '>=', $request->min_quantity);
        }

        // Filtro por quantidade máxima
        if ($request->has('max_quantity') && $request->max_quantity !== null) {
            $query->where('quantity', '<=', $request->max_quantity);
        }

        $products = $query->orderBy('quantity')->get();

        return view('reports.stock', compact('products'));
    }

    public function movements(Request $request): View
    {
        $query = Movement::with(['product', 'user']);

        // Filtro por produto
        if ($request->has('product_id') && $request->product_id) {
            $query->where('product_id', $request->product_id);
        }

        // Filtro por usuário
        if ($request->has('user_id') && $request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        // Filtro por tipo
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        // Filtro por data
        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $movements = $query->latest()->paginate(20);

        // Buscar dados para os filtros
        $products = Product::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();

        // Dados para estatísticas e gráficos
        $last7Days = Movement::where('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, type, COUNT(*) as count')
            ->groupBy('date', 'type')
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('date');

        $topProducts = Movement::with('product')
            ->selectRaw('product_id, COUNT(*) as movement_count, SUM(quantity) as total_quantity')
            ->groupBy('product_id')
            ->orderBy('movement_count', 'desc')
            ->limit(5)
            ->get();

        return view('reports.movements', compact(
            'movements', 
            'products', 
            'users', 
            'last7Days', 
            'topProducts'
        ));
    }
}