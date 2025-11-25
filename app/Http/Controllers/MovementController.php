<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class MovementController extends Controller
{
    public function index(): View
    {
        $movements = Movement::with(['product', 'user'])->latest()->get();
        return view('movements.index', compact('movements'));
    }

    public function create(): View
    {
        $products = Product::all();
        $users = User::where('role', 'funcionario')->get();
        return view('movements.create', compact('products', 'users'));
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'type' => 'required|in:entrada,saida',
        'quantity' => 'required|integer|min:1',
        'user_responsible_id' => 'required|exists:users,id',
        'notes' => 'nullable|string|max:255',
        'photo' => 'nullable|image|max:2048',
    ]);

    $product = Product::findOrFail($request->product_id);

    // Validar estoque para saída
    if ($request->type === 'saida' && $product->quantity < $request->quantity) {
        return back()->withErrors(['quantity' => 'Estoque insuficiente para esta saída.'])->withInput();
    }

    // Buscar o nome do usuário responsável
    $user = User::findOrFail($request->user_responsible_id);

    // Processar foto se existir
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('movement-photos', 'public');
    }

    // Criar movimentação com o nome do usuário
    Movement::create([
        'product_id' => $request->product_id,
        'type' => $request->type,
        'quantity' => $request->quantity,
        'user_id' => $user->id, // Salva o nome do usuário
        'notes' => $request->notes,
        'photo_path' => $photoPath,
    ]);

    // Atualizar estoque
    if ($request->type === 'entrada') {
        $product->increment('quantity', $request->quantity);
    } else {
        $product->decrement('quantity', $request->quantity);
    }

    return redirect()->route('movements.index')
        ->with('success', 'Movimentação registrada com sucesso!');
}

}
