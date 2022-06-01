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
                        <img src="{{ asset('img/logo.png') }}" alt="Talent Smart" class="w-80">
                    </a>
                </div>

                <div class="space-x-6">
                    <ul class="flex items-center space-x-8">
                        <li><a href="#" class="hidden md:block">Início</a></li>
                        <li><a href="#" class="hidden md:block">Sobre</a></li>
                        <li><a href="#" class="hidden md:block">Serviços</a></li>
                        <li><a href="#" class="hidden md:block">Depoimentos</a></li>
                    </ul>
                </div>
                <div class="space-x-6">
                    @auth
                        <ul class="flex items-center ">
                            <li><a href="{{ route('app.dash') }}"
                                    class="ml-4 px-6 py-2 rounded-full bg-blue-800 text-white 
                            font-bold hover:bg-blue-900 transition ease-in duration-150">Acessar
                                    Painel</a>
                            </li>
                        </ul>
                    @else
                        <ul class="flex items-center ">
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            <li><a href="{{ route('register') }}"
                                    class="ml-4 px-6 py-2 rounded-full bg-blue-800 text-white 
                                        font-bold whitespace-nowrap dhover:bg-blue-900 transition ease-in duration-150">Cadastre-se</a>
                            </li>
                        </ul>
                    @endauth

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
                    Sobre
                </x-responsive-nav-link>
                <x-responsive-nav-link href="/">
                    Serviços
                </x-responsive-nav-link>
                <x-responsive-nav-link href="/">
                    Depoimentos
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>

    <section class="max-w-7xl px-2 md:px-0 mx-auto py-24">
        <div class="flex justify-between items-center space-x-4">
            <div class="information w-full md:w-1/2 space-y-6">
                <h6 class="font-bold uppercase text-sm text-blue-900">Boas-vindas a TalentSmart</h6>
                <h1 class="text-6xl font-semibold">Encontre excelentes lugares para trabalhar</h1>
                <p class="text-lg text-gray-500">Encontre suas vagas de emprego no Talent Smart, são milhares de
                    empregos
                    nas maiores empresas do país.</p>
                <div class="flex justify-between items-center max-w-md">
                    <a href="{{ route('register') }}"
                        class="bg-blue-800 text-white px-5 py-3 rounded-full font-bold">Comece agora mesmo</a>
                    <button class="border-2 border-blue-800 text-blue-800 px-5 py-3 rounded-full font-bold">Conheça
                        nosso trabalho</button>
                </div>
            </div>
            <div class="image w-1/2 hidden md:block">
                <img class="block mx-auto" src="{{ asset('img/bg-home.jpg') }}" alt="Pessoa">
            </div>
        </div>
    </section>

    <section class="number_geral max-w-7xl  px-2 md:px-0 mx-auto ">
        <div class="number_geral_wapper flex-col py-10 bg-gray-100 rounded-xl md:flex-row flex justify-between items-center">
            <div class="border-b-2 md:border-r-2  md:border-b-0 border-blue-300 text-center py-6 px-32">
                <h2 class="font-bold text-5xl">+3.500</h2>
                <p class="text-blue-800 text-md">Vagas disponíveis</p>
            </div>
            <div class="text-center py-6 px-32">
                <h2 class="font-bold text-5xl">+2.000</h2>
                <p class="text-blue-800 text-md">Empresas cadastradas</p>
            </div>
            <div class="border-t-2 md:border-l-2 md:border-t-0 border-blue-300 text-center py-6 px-32">
                <h2 class="font-bold text-5xl">+1.000</h2>
                <p class="text-blue-800 text-md">Candidatos disponíveis</p>
            </div>
        </div>
    </section>

    <section class="services  py-24 max-w-screen-lg mx-auto">
        <div class="mb-10">
            <p class="pt-6 pb-3 text-blue-500 uppercase text-center">Serviços</p>
            <h2 class="text-4xl text-center font-bold">Como podemos ajuda-lo <br> a encontrar uma vaga ou candidato?
            </h2>
        </div>
        <div class="services-wrapper px-2 md:px-0 md:flex-row flex-wrap flex flex-col justify-between items-center space-y-8">

            <div class="services-wrapper-box border border-blue-400 px-6 py-10 rounded-xl shadow-sm w-full md:w-80 mt-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <h4 class="my-4 text-2xl font-bold">Title one line here</h4>
                <p class="line-clamp-3 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum et sint perspiciatis vitae iure
                    voluptate accusantium veniam corrupti, autem error dolore quae ad itaque ex ipsum dolores mollitia
                    blanditiis in.</p>
            </div>
            <div class="services-wrapper-box border border-blue-400 px-6 py-10 rounded-xl shadow-sm w-full md:w-80 mt-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <h4 class="my-4 text-2xl font-bold">Title one line here</h4>
                <p class="line-clamp-3 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum et sint perspiciatis vitae iure
                    voluptate accusantium veniam corrupti, autem error dolore quae ad itaque ex ipsum dolores mollitia
                    blanditiis in.</p>
            </div>
            <div class="services-wrapper-box border border-blue-400 px-6 py-10 rounded-xl shadow-sm w-full md:w-80 mt-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <h4 class="my-4 text-2xl font-bold">Title one line here</h4>
                <p class="line-clamp-3 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum et sint perspiciatis vitae iure
                    voluptate accusantium veniam corrupti, autem error dolore quae ad itaque ex ipsum dolores mollitia
                    blanditiis in.</p>
            </div>
            <div class="services-wrapper-box border border-blue-400 px-6 py-10 rounded-xl shadow-sm w-full md:w-80 mt-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <h4 class="my-4 text-2xl font-bold">Title one line here</h4>
                <p class="line-clamp-3 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum et sint perspiciatis vitae iure
                    voluptate accusantium veniam corrupti, autem error dolore quae ad itaque ex ipsum dolores mollitia
                    blanditiis in.</p>
            </div>
            <div class="services-wrapper-box border border-blue-400 px-6 py-10 rounded-xl shadow-sm w-full md:w-80 mt-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <h4 class="my-4 text-2xl font-bold">Title one line here</h4>
                <p class="line-clamp-3 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum et sint perspiciatis vitae iure
                    voluptate accusantium veniam corrupti, autem error dolore quae ad itaque ex ipsum dolores mollitia
                    blanditiis in.</p>
            </div>
            <div class="services-wrapper-box border border-blue-400 px-6 py-10 rounded-xl shadow-sm w-full md:w-80 mt-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <h4 class="my-4 text-2xl font-bold">Title one line here</h4>
                <p class="line-clamp-3 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eum et sint perspiciatis vitae iure
                    voluptate accusantium veniam corrupti, autem error dolore quae ad itaque ex ipsum dolores mollitia
                    blanditiis in.</p>
            </div>

        </div>
    </section> <!-- end Sevices -->

    <section class="about py-24 max-w-7xl mx-auto">
        <div class="about-wrapper flex flex-col md:flex-row flex-wrap justify-between items-center">
            <div class="about-wrapper-img w-full md:w-1/2 p-3">
                <img class="rounded-xl" src="{{ asset('img/about.jpg') }}" alt="About">
            </div>
            <div class="about-wrapper-text w-full md:w-1/2 p-8">
                <p class="pt-6 pb-3 text-blue-500 uppercase">Sobre Nós</p>
                <h2 class="text-4xl font-bold mb-4">Entenda quem somos <br> e porque existimos</h2>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione atque dolores libero necessitatibus
                    officia? Vitae praesentium eius quasi minus maiores culpa quod natus omnis fugiat assumenda? Autem
                    voluptatibus pariatur natus labore vitae repellat velit, dolor obcaecati voluptate qui delectus ea,
                    veritatis nam maiores facere atque corporis suscipit ipsam? A, dicta.</p>
            </div>
        </div>
    </section>
</body>

</html>
