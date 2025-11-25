<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Bem-vindo(a), {{ auth()->user()->name }}! • 
                    {{ auth()->user()->isAdmin() ? 'Administrador' : 'Funcionário' }} • 
                    {{ now()->format('d/m/Y - H:i') }}
                </p>
            </div>
            <div class="text-sm text-gray-500">
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                    ✅ Sistema Online
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Alertas -->
            @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <!-- Estatísticas Principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total de Produtos -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total de Produtos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_products'] }}</p>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        {{ $stats['products_with_stock'] }} com estoque
                    </div>
                </div>

                <!-- Movimentações do Dia -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Mov. Hoje</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ $stats['today_movements_count'] }}
                            </p>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        {{ $stats['today_entradas'] }} entradas • {{ $stats['today_saidas'] }} saídas
                    </div>
                </div>

                <!-- Estoque Baixo -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Estoque Baixo</p>
                            <p class="text-3xl font-bold text-yellow-600 mt-2">
                                {{ $stats['low_stock_count'] }}
                            </p>
                        </div>
                        <div class="bg-yellow-50 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 text-sm text-gray-500">
                        Produtos com menos de 10 unidades
                    </div>
                </div>

                <!-- Produtos em Falta -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Em Falta</p>
                            <p class="text-3xl font-bold text-red-600 mt-2">
                                {{ $stats['out_of_stock_count'] }}
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

            @if(auth()->user()->isAdmin())
            <!-- Estatísticas Adicionais para Admin -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Usuários</h3>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                            {{ $stats['total_users'] }} total
                        </span>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Administradores</span>
                            <span class="font-medium">{{ $stats['admin_users'] }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Funcionários</span>
                            <span class="font-medium">{{ $stats['funcionario_users'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Movimentações</h3>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                            {{ $stats['total_movements'] }} total
                        </span>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Entradas</span>
                            <span class="font-medium text-green-600">{{ $stats['entrada_movements'] }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Saídas</span>
                            <span class="font-medium text-red-600">{{ $stats['saida_movements'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Valor em Estoque</h3>
                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">
                            Total
                        </span>
                    </div>
                    <div class="text-2xl font-bold text-purple-600">
                        R$ {{ number_format($stats['total_stock_value'], 2, ',', '.') }}
                    </div>
                    <div class="text-sm text-gray-500 mt-2">
                        Valor total dos produtos em estoque
                    </div>
                </div>
            </div>
            @endif

            <!-- Ações Rápidas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Ações para Admin -->
                @if(auth()->user()->isAdmin())
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-50 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Ações de Administrador</h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="{{ route('users.index') }}" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">Gerenciar Usuários</span>
                        </a>
                        <a href="{{ route('products.create') }}" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-green-50 hover:border-green-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="text-sm font-medium">Novo Produto</span>
                        </a>
                        <a href="{{ route('reports.stock') }}" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-purple-50 hover:border-purple-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span class="text-sm font-medium">Relatórios</span>
                        </a>
                        <a href="{{ route('products.index') }}" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-orange-50 hover:border-orange-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6"></path>
                            </svg>
                            <span class="text-sm font-medium">Ver Produtos</span>
                        </a>
                    </div>
                </div>
                @endif

                <!-- Ações de Movimentação -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-50 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Movimentações</h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="{{ route('movements.create') }}" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="text-sm font-medium">Nova Movimentação</span>
                        </a>
                        <a href="{{ route('movements.index') }}" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-gray-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span class="text-sm font-medium">Histórico</span>
                        </a>
                    </div>

                    <!-- Últimas Movimentações -->
                    @if($recentMovements->count() > 0)
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Últimas Movimentações</h4>
                        <div class="space-y-2">
                            @foreach($recentMovements as $movement)
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 rounded-full {{ $movement->type === 'entrada' ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                    <span class="text-gray-600 truncate max-w-[120px]">{{ $movement->product->name }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="{{ $movement->type === 'entrada' ? 'text-green-600' : 'text-red-600' }} font-medium">
                                        {{ $movement->type === 'entrada' ? '+' : '-' }}{{ $movement->quantity }}
                                    </span>
                                    <span class="text-gray-400 text-xs">{{ $movement->created_at->format('H:i') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>