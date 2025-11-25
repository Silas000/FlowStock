<x-guest-layout>
    <x-slot name="logo">
        <div class="flex items-center justify-center">
            <div class="bg-blue-600 p-3 rounded-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div class="ml-3">
                <h1 class="text-2xl font-bold text-gray-900">StockFlow</h1>
                <p class="text-sm text-gray-500">Recuperar Senha</p>
            </div>
        </div>
    </x-slot>

    <div class="mb-6 text-center">
        <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full mx-auto mb-4">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>
        <p class="text-gray-600 text-sm">
            Informe seu email para receber um link de redefinição de senha.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
            <div class="relative mt-1">
                <x-text-input 
                    id="email" 
                    class="block w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    placeholder="seu@email.com" 
                />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-500 font-medium transition duration-200">
                ← Voltar para login
            </a>
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                {{ __('Enviar Link') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Ajuda -->
    <div class="mt-6 text-center">
        <p class="text-xs text-gray-500">
            Não recebeu o email? Verifique sua pasta de spam.
        </p>
    </div>
</x-guest-layout>