<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto sm:px-4">
            <div class="flex justify-between h-auto py-6 items-center">
                <div class="space-x-6">
                    <!-- Logo -->
                    <a href="/">
                        <img src="{{ asset('img/logo.png') }}" alt="Talent Smart" class="w-60">
                    </a>
                </div>

                <div class="space-x-6">
                    <ul class="flex items-center space-x-8">
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Depoimentos</a></li>
                    </ul>
                </div>
                <div class="space-x-6">
                    <ul class="flex items-center ">
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                        <li><a href="{{ route('register') }}"
                                class="ml-4 px-6 py-2 rounded-full bg-blue-800 text-white 
                                font-bold hover:bg-blue-900 transition ease-in duration-150">Cadastre-se</a>
                        </li>
                    </ul>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="/">
                    Início
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/">
                    Contato
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-32">
        <div class="flex justify-between items-center space-x-4">
            <div class="information w-1/2 space-y-6">
                <h6 class="font-bold uppercase text-sm text-blue-900">Boas-vindas a TalentSmart</h6>
                <h1 class="text-6xl font-semibold">Encontre excelentes lugares para trabalhar</h1>
                <p class="text-lg text-gray-500">Encontre suas vagas de emprego no Infojobs, são milhares de empregos nas maiores empresas do país.</p>
                <div class="flex justify-between items-center max-w-md">
                    <button class="bg-blue-800 text-white px-5 py-3 rounded-full font-bold">Comece agora mesmo</button>
                    <button class="border-2 border-blue-800 text-blue-800 px-5 py-3 rounded-full font-bold">Conheça nosso trabalho</button>
                </div>
            </div>
            <div class="image w-1/2">
                <img class="block mx-auto" src="{{ asset('img/bg-home.jpg') }}" alt="Pessoa">
            </div>
        </div>
    </div>


</body>

</html>
