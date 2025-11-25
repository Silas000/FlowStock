<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Sobre o Sistema
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Conheça mais sobre o StockFlow e seu desenvolvedor
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-blue-600 to-purple-700 rounded-2xl shadow-xl overflow-hidden mb-8">
                <div class="px-8 py-12 text-center text-white">
                    <div class="max-w-3xl mx-auto">
                        <div class="bg-white bg-opacity-20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold mb-4">StockFlow</h1>
                        <p class="text-xl opacity-90 mb-8 leading-relaxed">
                            Sistema completo de gestão de estoque desenvolvido com as melhores práticas de programação
                        </p>
                        <div class="flex flex-wrap justify-center gap-4 text-sm">
                            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full">Laravel 11</span>
                            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full">Tailwind CSS</span>
                            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full">MySQL</span>
                            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full">MVC Architecture</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Sobre o Sistema -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <div class="flex items-center mb-8">
                        <div class="bg-blue-100 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 p-5">Sobre o StockFlow</h2>
                    </div>
                    
                    <div class="space-y-6 text-gray-600 leading-relaxed p-2">
                        <p class="text-lg">
                            O <strong class="text-blue-600">StockFlow</strong> é um sistema de gestão de estoque desenvolvido para otimizar 
                            o controle de produtos, movimentações e relatórios em empresas de diversos portes.
                        </p>
                        
                        <p>
                            Desenvolvido com <strong class="text-red-500">Laravel 11</strong>, utiliza a arquitetura MVC e as melhores 
                            práticas de desenvolvimento para garantir performance, segurança e escalabilidade.
                        </p>

                        <div class="bg-gray-50 rounded-lg p-6 mt-6">
                            <h3 class="font-semibold text-gray-900 mb-4 text-lg">🎯 Funcionalidades Principais</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Gestão Completa de Produtos</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Controle de Usuários e Permissões</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Movimentações de Estoque</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Relatórios Detalhados</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Sistema de Permissões Hierárquico</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Interface Totalmente Responsiva</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sobre o Desenvolvedor -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-10">
                    <div class="flex items-center mb-8">
                        <div class="bg-purple-100 p-3 rounded-xl mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 p-1">Sobre o Desenvolvedor</h2>
                    </div>

                    <div class="text-center mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl font-bold">SR</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Silas Rosário</h3>
                        <p class="text-gray-600 text-lg">Desenvolvedor Full Stack</p>
                    </div>

                    <div class="space-y-6 text-gray-600 leading-relaxed p-5">
                        <p class="text-lg">
                            Desenvolvedor apaixonado por tecnologia com experiência em criar soluções 
                            robustas e escaláveis usando as mais modernas tecnologias web.
                        </p>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <h4 class="font-semibold text-gray-900 mb-4 text-lg">🛠️ Tecnologias & Habilidades</h4>
                            <div class="flex flex-wrap gap-3">

                                <span class="bg-blue-100 text-blue-600 px-2 py-2 rounded-lg text-sm font-medium">PHP</span>
                                <span class="bg-blue-100 text-blue-600 px-2 py-2 rounded-lg text-sm font-medium">Laravel</span>
                                <span class="bg-green-100 text-green-600 px-2    py-2 rounded-lg text-sm font-medium">JavaScript</span>

                                <span class="bg-green-100 text-green-600 px-2 py-2 rounded-lg text-sm font-medium">Vue.js</span>
                                <span class="bg-yellow-100 text-yellow-600 px-2 py-2 rounded-lg text-sm font-medium">MySQL</span>
                                <span class="bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm font-medium">Git</span>
                                <span class="bg-purple-100 text-purple-600 px-2 py-2 rounded-lg text-sm font-medium">Tailwind CSS</span>
                                <span class="bg-purple-100 text-indigo-600 px-2 py-2 rounded-lg text-sm font-medium">API REST</span>

                        </div>

                        <div class="flex justify-center space-x-4 pt-4">
                            <a href="https://www.linkedin.com/in/silas-rosario/" target="_blank" 
                               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 flex items-center font-medium">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                                LinkedIn
                            </a>
                            <a href="https://github.com/silas000" target="_blank" 
                               class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition duration-200 flex items-center font-medium">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>