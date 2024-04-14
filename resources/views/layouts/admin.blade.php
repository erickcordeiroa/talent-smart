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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <div class="flex items-start justify-between w-full max-w-6xl py-2 mx-auto">
            <div class="hidden w-1/3 py-2 mx-2 md:block shadow-blue-100">
                <!-- Section USER INFO -->
                <div class="p-5 bg-white border-gray-300 rounded-md shadow-lg shadow-gray-200">
                    <div class="flex items-center justify-between w-full">
                        <div class="w-2/6 mr-4">
                            @if (Auth::user()->photo != null)
                                <img class="object-cover w-24 rounded-full"
                                    src="{{ url('media/avatars/'. Auth::user()->photo) }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                        </div>
                        <div class="w-full">
                            @if (Auth::user()->fantasy != null)
                                <h2 class="font-bold text-md">{{ Auth::user()->fantasy }}</h2>
                            @else
                                <h2 class="font-bold text-md">Nome fantasia da sua empresa</h2>
                            @endif
                        </div>
                    </div>

                    <!-- LINKS MENU -->
                    <ul class="w-full py-4 mt-6 border-t border-gray-200">
                        <li class="p-3 border-b border-gray-100 hover:underline rounded-xl">
                            <a class="flex flex-row items-center justify-between" href="{{ route('company.dash') }}">
                                <span>Todos os Candidatos</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="p-3 border-b border-gray-100 hover:underline rounded-xl">
                            <a class="flex flex-row items-center justify-between"
                                href="{{ route('company.interested') }}">
                                <span>Interessados </span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="p-3 border-b border-gray-100 hover:underline rounded-xl">
                            <a class="flex flex-row items-center justify-between" href="{{ route('company.jobs') }}">
                                <span>Cadastrar Vagas</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="p-3 border-b border-gray-100 hover:underline rounded-xl">
                            <a class="flex flex-row items-center justify-between" href="{{ route('company.clients') }}">
                                <span>Cadastrar Clientes</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="p-3 border-b border-gray-100 hover:underline rounded-xl">
                            <a class="flex flex-row items-center justify-between" href="{{ route('company.categories') }}">
                                <span>Cadastrar Categorias</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>

                        <li class="p-3 border-b border-gray-100 hover:underline rounded-xl">
                            <a class="flex flex-row items-center justify-between" href="{{ route('company.clients') }}">
                                <span>Cadastrar Benefícios</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="w-full px-2 py-2 md:w-2/3 md:mx-2 md:px-0">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

</body>

</html>
