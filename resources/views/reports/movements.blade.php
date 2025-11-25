<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Relatório de Movimentações
            </h2>
            <div class="space-x-2">
                <button onclick="window.print()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Imprimir
                </button>
                <a href="{{ route('reports.stock') }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Ver Estoque
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Filtros -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Filtros</h3>
                        <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div>
                                <label for="product_id" class="block text-sm font-medium text-gray-700">Produto</label>
                                <select name="product_id" id="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Todos os produtos</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="user_id" class="block text-sm font-medium text-gray-700">Usuário</label>
                                <select name="user_id" id="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Todos os usuários</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                                <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Todos os tipos</option>
                                    <option value="entrada" {{ request('type') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                                    <option value="saida" {{ request('type') == 'saida' ? 'selected' : '' }}>Saída</option>
                                </select>
                            </div>
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700">Data</label>
                                <input type="date" name="date" id="date" value="{{ request('date') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">
                                    Filtrar
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Estatísticas -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h3 class="text-sm font-semibold text-blue-800">Total de Movimentações</h3>
                            <p class="text-2xl font-bold text-blue-600">{{ $movements->total() }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h3 class="text-sm font-semibold text-green-800">Entradas</h3>
                            <p class="text-2xl font-bold text-green-600">
                                {{ $movements->where('type', 'entrada')->count() }}
                            </p>
                        </div>
                        <div class="bg-red-50 p-4 rounded-lg">
                            <h3 class="text-sm font-semibold text-red-800">Saídas</h3>
                            <p class="text-2xl font-bold text-red-600">
                                {{ $movements->where('type', 'saida')->count() }}
                            </p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h3 class="text-sm font-semibold text-purple-800">Itens Movimentados</h3>
                            <p class="text-2xl font-bold text-purple-600">
                                {{ $movements->sum('quantity') }}
                            </p>
                        </div>
                    </div>

                    <!-- Tabela de Movimentações -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Data/Hora
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Produto
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Usuário
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantidade
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Observações
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Foto
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($movements as $movement)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $movement->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $movement->product->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Estoque: {{ $movement->product->quantity }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $movement->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $movement->type == 'entrada' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $movement->type == 'entrada' ? 'ENTRADA' : 'SAÍDA' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="{{ $movement->type == 'entrada' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                            {{ $movement->type == 'entrada' ? '+' : '-' }}{{ $movement->quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        {{ $movement->notes ? \Illuminate\Support\Str::limit($movement->notes, 50) : '---' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        @if($movement->photo_path)
                                            <button onclick="openPhoto('{{ Storage::url($movement->photo_path) }}')" 
                                                    class="text-blue-600 hover:text-blue-900">
                                                Ver Foto
                                            </button>
                                        @else
                                            <span class="text-gray-400">---</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Nenhuma movimentação encontrada.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginação -->
                    @if($movements->hasPages())
                    <div class="mt-4">
                        {{ $movements->links() }}
                    </div>
                    @endif

                    <!-- Resumo por Período -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white border rounded-lg p-6">
                            <h3 class="text-lg font-semibold mb-4">Movimentações por Dia (Últimos 7 dias)</h3>
                            <div class="space-y-2">
                                @foreach($last7Days as $date => $movementsByType)
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-sm font-medium">{{ \Carbon\Carbon::parse($date)->format('d/m') }}</span>
                                    <div class="flex space-x-4">
                                        <span class="text-green-600 text-sm">
                                            +{{ $movementsByType->where('type', 'entrada')->sum('count') }}
                                        </span>
                                        <span class="text-red-600 text-sm">
                                            -{{ $movementsByType->where('type', 'saida')->sum('count') }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-white border rounded-lg p-6">
                            <h3 class="text-lg font-semibold mb-4">Produtos Mais Movimentados</h3>
                            <div class="space-y-2">
                                @foreach($topProducts as $topProduct)
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-sm font-medium">{{ $topProduct->product->name }}</span>
                                    <span class="text-sm text-gray-600">{{ $topProduct->movement_count }} mov.</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Foto -->
    <div id="photoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-4 rounded-lg max-w-2xl max-h-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Foto da Movimentação</h3>
                <button onclick="closePhoto()" class="text-gray-500 hover:text-gray-700">
                    ✕
                </button>
            </div>
            <img id="modalPhoto" src="" alt="Foto" class="max-w-full max-h-96 object-contain">
        </div>
    </div>

    <script>
        function openPhoto(photoUrl) {
            document.getElementById('modalPhoto').src = photoUrl;
            document.getElementById('photoModal').classList.remove('hidden');
        }

        function closePhoto() {
            document.getElementById('photoModal').classList.add('hidden');
        }

        // Fechar modal ao clicar fora
        document.getElementById('photoModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePhoto();
            }
        });
    </script>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
            }
            .bg-white {
                background: white !important;
            }
            .border {
                border: 1px solid #000 !important;
            }
            .shadow-sm {
                box-shadow: none !important;
            }
            .p-6 {
                padding: 1rem !important;
            }
        }
    </style>
</x-app-layout>