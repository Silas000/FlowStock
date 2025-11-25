<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalhes do Produto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Informações do Produto</h3>
                            <div class="space-y-3">
                                <div>
                                    <strong>ID:</strong> {{ $product->id }}
                                </div>
                                <div>
                                    <strong>Nome:</strong> {{ $product->name }}
                                </div>
                                <div>
                                    <strong>Descrição:</strong> {{ $product->description ?? 'N/A' }}
                                </div>
                                <div>
                                    <strong>Quantidade em Estoque:</strong> 
                                    <span class="px-2 py-1 rounded text-xs {{ $product->quantity > 10 ? 'bg-green-100 text-green-800' : ($product->quantity > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $product->quantity }}
                                    </span>
                                </div>
                                <div>
                                    <strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}
                                </div>
                            </div>

                            <div class="mt-6 flex space-x-4">
                                <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Editar Produto
                                </a>
                                <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>