<!-- resources/views/movements/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nova Movimentação Manual
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('movements.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="bg-blue-50 p-4 rounded-lg mb-6">
                            <h3 class="text-lg font-semibold text-blue-800">Movimentação Manual</h3>
                            <p class="text-blue-700 text-sm">Preencha os dados da movimentação manualmente</p>
                        </div>

                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Produto *</label>
                            <select name="product_id" id="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">Selecione um produto...</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} - Estoque: {{ $product->quantity }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Movimentação *</label>
                            <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">Selecione...</option>
                                <option value="entrada" {{ old('type') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                                <option value="saida" {{ old('type') == 'saida' ? 'selected' : '' }}>Saída</option>
                            </select>
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantidade *</label>
                            <input type="number" name="quantity" id="quantity"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                min="1" value="{{ old('quantity') }}" required>
                        </div>

                        <!-- Campo de seleção de usuário -->
                        <div>
                            <label for="user_responsible_id" class="block text-sm font-medium text-gray-700">Responsável *</label>
                            <select name="user_responsible_id" id="user_responsible_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="">Selecione um funcionário...</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_responsible_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Observações</label>
                            <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('notes') }}</textarea>
                        </div>

                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700">Foto (Opcional)</label>
                            <input type="file" name="photo" id="photo" class="mt-1 block w-full" accept="image/*">
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('movements.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                                Voltar
                            </a>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                Registrar Movimentação
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>