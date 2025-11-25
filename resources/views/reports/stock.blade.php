<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Relatório de Estoque
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Visão geral completa do estoque • Atualizado em {{ now()->format('d/m/Y H:i') }}
                </p>
            </div>
            <div class="flex space-x-3">
                <button onclick="window.print()" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200 flex items-center no-print">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Imprimir
                </button>
                <a href="{{ route('reports.movements') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-200 flex items-center no-print">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                    Ver Movimentações
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filtros -->
            <div class="mb-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6 no-print">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Filtros</h3>
                    @if(request()->hasAny(['search', 'min_quantity', 'max_quantity']))
                    <a href="{{ route('reports.stock') }}" class="text-sm text-gray-600 hover:text-gray-900 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Limpar Filtros
                    </a>
                    @endif
                </div>
                <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Buscar Produto</label>
                        <div class="relative">
                            <input type="text" name="search" id="search" value="{{ request('search') }}" 
                                   class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                   placeholder="Nome ou descrição...">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="min_quantity" class="block text-sm font-medium text-gray-700 mb-2">Estoque Mín.</label>
                        <input type="number" name="min_quantity" id="min_quantity" value="{{ request('min_quantity') }}"
                               class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                               placeholder="0">
                    </div>
                    <div>
                        <label for="max_quantity" class="block text-sm font-medium text-gray-700 mb-2">Estoque Máx.</label>
                        <input type="number" name="max_quantity" id="max_quantity" value="{{ request('max_quantity') }}"
                               class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                               placeholder="100">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            <option value="">Todos</option>
                            <option value="normal" {{ request('status') == 'normal' ? 'selected' : '' }}>Estoque Normal</option>
                            <option value="baixo" {{ request('status') == 'baixo' ? 'selected' : '' }}>Estoque Baixo</option>
                            <option value="faltando" {{ request('status') == 'faltando' ? 'selected' : '' }}>Em Falta</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filtrar
                        </button>
                    </div>
                </form>
            </div>

            <!-- Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total de Produtos</p>
                            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $products->count() }}</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        {{ $products->where('quantity', '>', 0)->count() }} com estoque
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Valor Total</p>
                            <p class="text-3xl font-bold text-green-600 mt-2">
                                R$ {{ number_format($products->sum(function($product) { return $product->quantity * $product->price; }), 2, ',', '.') }}
                            </p>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        Valor total em estoque
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Estoque Baixo</p>
                            <p class="text-3xl font-bold text-yellow-600 mt-2">
                                {{ $products->where('quantity', '<', 10)->where('quantity', '>', 0)->count() }}
                            </p>
                        </div>
                        <div class="bg-yellow-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        Menos de 10 unidades
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Em Falta</p>
                            <p class="text-3xl font-bold text-red-600 mt-2">
                                {{ $products->where('quantity', 0)->count() }}
                            </p>
                        </div>
                        <div class="bg-red-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        Produtos sem estoque
                    </div>
                </div>
            </div>

            <!-- Gráfico de Distribuição -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Distribuição de Estoque</h3>
                    <div class="text-sm text-gray-500">
                        {{ $products->count() }} produtos analisados
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="relative inline-block mb-3">
                            <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                                <span class="text-2xl font-bold text-green-600">{{ $products->where('quantity', '>=', 10)->count() }}</span>
                            </div>
                            <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-green-800">Estoque Normal</p>
                        <p class="text-xs text-gray-500">10+ unidades</p>
                        <div class="w-full bg-green-200 rounded-full h-2 mt-2">
                            <div class="bg-green-500 h-2 rounded-full transition-all duration-500" 
                                 style="width: {{ $products->count() > 0 ? ($products->where('quantity', '>=', 10)->count() / $products->count() * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">
                            {{ $products->count() > 0 ? number_format(($products->where('quantity', '>=', 10)->count() / $products->count() * 100), 1) : 0 }}%
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="relative inline-block mb-3">
                            <div class="w-20 h-20 rounded-full bg-yellow-100 flex items-center justify-center">
                                <span class="text-2xl font-bold text-yellow-600">{{ $products->where('quantity', '>', 0)->where('quantity', '<', 10)->count() }}</span>
                            </div>
                            <div class="absolute -top-1 -right-1 w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-yellow-800">Estoque Baixo</p>
                        <p class="text-xs text-gray-500">1-9 unidades</p>
                        <div class="w-full bg-yellow-200 rounded-full h-2 mt-2">
                            <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500" 
                                 style="width: {{ $products->count() > 0 ? ($products->where('quantity', '>', 0)->where('quantity', '<', 10)->count() / $products->count() * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">
                            {{ $products->count() > 0 ? number_format(($products->where('quantity', '>', 0)->where('quantity', '<', 10)->count() / $products->count() * 100), 1) : 0 }}%
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="relative inline-block mb-3">
                            <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">
                                <span class="text-2xl font-bold text-red-600">{{ $products->where('quantity', 0)->count() }}</span>
                            </div>
                            <div class="absolute -top-1 -right-1 w-6 h-6 bg-red-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm font-medium text-red-800">Em Falta</p>
                        <p class="text-xs text-gray-500">0 unidades</p>
                        <div class="w-full bg-red-200 rounded-full h-2 mt-2">
                            <div class="bg-red-500 h-2 rounded-full transition-all duration-500" 
                                 style="width: {{ $products->count() > 0 ? ($products->where('quantity', 0)->count() / $products->count() * 100) : 0 }}%"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">
                            {{ $products->count() > 0 ? number_format(($products->where('quantity', 0)->count() / $products->count() * 100), 1) : 0 }}%
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tabela de Produtos -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Produtos em Estoque</h3>
                        <div class="text-sm text-gray-500">
                            {{ $products->count() }} produto(s) encontrado(s)
                        </div>
                    </div>

                    @if($products->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum produto encontrado</h3>
                        <p class="text-gray-500">Tente ajustar os filtros de busca.</p>
                    </div>
                    @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Produto
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estoque
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Preço
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Valor Total
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider no-print">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($products as $product)
                                <tr class="hover:bg-gray-50 transition duration-150 {{ $product->quantity == 0 ? 'bg-red-50' : ($product->quantity < 10 ? 'bg-yellow-50' : '') }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                                <span class="text-white font-semibold text-sm">
                                                    {{ strtoupper(substr($product->name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">
                                                    {{ $product->name }}
                                                </div>
                                                <div class="text-sm text-gray-500 line-clamp-1 max-w-xs">
                                                    {{ $product->description ?: 'Sem descrição' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $product->quantity }}</div>
                                        <div class="text-xs text-gray-500">unidades</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">
                                            R$ {{ number_format($product->price, 2, ',', '.') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-blue-600">
                                            R$ {{ number_format($product->quantity * $product->price, 2, ',', '.') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($product->quantity == 0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            EM FALTA
                                        </span>
                                        @elseif($product->quantity < 10)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"></path>
                                            </svg>
                                            ESTOQUE BAIXO
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            NORMAL
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium no-print">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('products.show', $product) }}" 
                                               class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition duration-200"
                                               title="Ver detalhes">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('movements.create') }}?product_id={{ $product->id }}" 
                                               class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-green-700 bg-white hover:bg-green-50 transition duration-200"
                                               title="Movimentar estoque">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                font-size: 12px !important;
            }
            .bg-white {
                background: white !important;
            }
            .shadow-sm, .shadow-lg {
                box-shadow: none !important;
            }
            .border {
                border: 1px solid #e5e7eb !important;
            }
            .py-8 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }
        }
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-app-layout>