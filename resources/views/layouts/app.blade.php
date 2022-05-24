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

        <div class="w-full max-w-6xl mx-auto flex items-start justify-between py-2">
            <div class="w-1/3 py-2 mx-2 shadow-blue-100">
                <!-- Section USER INFO -->
                <div class="bg-white rounded-md border-gray-300 p-5 shadow-lg shadow-gray-200">
                    <div class="w-full flex items-center justify-between">
                        <div class="w-2/6 mr-4">
                            @if (Auth::user()->photo != null)
                                <img class="w-24 rounded-full object-cover" src="{{ asset('storage/'.Auth::user()->photo); }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                        </div>
                        <div class="w-full">
                            <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
                            <h5 class="text-md font-normal text-orange-500">{{ Auth::user()->profile }}</h5>
                        </div>
                    </div>
                    <div class="about-user mt-4 line-clamp-3">
                        <p>{{ Auth::user()->description }}</p>
                    </div>
                </div>

                <!-- LINKS MENU -->
                <div class="bg-white rounded-md border-gray-300 p-5 mt-4">
                    <ul class="w-full">
                        <li class="p-3 border-b border-gray-100"><a class="hover:underline" href="{{ route('app.jobs') }}">Minhas Vagas</a></li>
                        <li class="p-3 border-b border-gray-100"><a class="hover:underline" href="{{ route('app.experiences') }}">Minhas
                                Experiências</a></li>
                        <li class="p-3 border-gray-100"><a class="hover:underline" href="{{ route('app.educations') }}">Meus Cursos</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-2/3 py-2 mx-2">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
