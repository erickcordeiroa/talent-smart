<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-2 sm:px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-6 w-6/12">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('app.dash') }}">
                        <img src="{{ asset('img/icon.png') }}" alt="Talent Smart" class="w-16">
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 items-center">
                @if (Auth::user()->account == 'candidate')
                    {{-- Notifications --}}
                    <x-dropdown align="right" width="w-72">
                        <x-slot name="trigger">
                            <div x-data="{ show: true }" @click="
                                fetch('{{ route('app.view.notification') }}', {
                                method: 'get',
                                }).then(response => {
                                    return;
                                }),
                                show = false
                            ">
                                <button class="bell text-gray-500 relative w-7">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>
                                    @if ($countNotify != 0)
                                        <span x-show="show"
                                            class="bollet block z-10 absolute top-0 w-10 h-10 rounded-full text-red-600 text-3xl left-0">
                                            &bull;
                                        </span>
                                    @endif
                                </button>
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            @if (!$notifications->isEmpty())
                                @foreach ($notifications as $item)
                                    <x-dropdown-link href="#">
                                        <div class="{{ $item->view === 0 ? 'opacity-100' : 'opacity-50' }}">
                                            <p class="font-semibold text-sm opa">{{ $item->fantasy }}</p>
                                            <p class="text-gray-500 text-xs mb-1">
                                                {{ $item->status == 'off'
                                                    ? 'Classificou como não adequado sua candidatura'
                                                    : 'Classificou como adequado sua candidatura' }}
                                            </p>
                                            <div class="flex items-center justify-between">
                                                @if ($item->status == 'off')
                                                    <span
                                                        class="text-white px-2 py-1 capitalize bg-red-500 rounded-xl text-xs">Recusou</span>
                                                @else
                                                    <span
                                                        class="text-white px-2 py-1 capitalize bg-green-500 rounded-xl text-xs">Aceitou</span>
                                                @endif
                                                <span
                                                    class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>

                                            </div>
                                        </div>
                                    </x-dropdown-link>
                                @endforeach
                            @else
                                <div class="text-gray-500 text-center p-3 text-sm">
                                    <p>Nenhuma notificação encontrada!</p>
                                </div>
                            @endif
                        </x-slot>
                    </x-dropdown>
                @endif

                {{-- Dropdown User --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="ml-4 flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="mr-4">
                                @if (Auth::user()->photo != null)
                                    <img class="w-10 rounded-full object-cover"
                                        src="{{ url('/media/avatars/' . Auth::user()->photo) }}"
                                        alt="{{ Auth::user()->name }}" />
                                @else
                                    <img class="w-10 inline rounded-full" src="{{ asset('img/default-user.png') }}"
                                        alt="{{ Auth::user()->name }}">
                                @endif
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-3">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if (Auth::user()->account == 'candidate')
                            <x-dropdown-link href="{{ route('app.perfil') }}">
                                {{ __('Meu Perfil') }}
                            </x-dropdown-link>
                        @else
                            <x-dropdown-link href="{{ route('company.profile') }}">
                                {{ __('Meu Perfil') }}
                            </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::user()->account == 'candidate')
                <x-responsive-nav-link :href="route('app.dash')" :active="request()->routeIs('app.dash')">
                    {{ __('Home') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('app.perfil') }}" :active="request()->routeIs('app.perfil')">
                    {{ __('Meu Perfil') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('app.jobs') }}" :active="request()->routeIs('app.jobs')">
                    {{ __('Minhas Vagas') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('app.experiences') }}" :active="request()->routeIs('app.experiences')">
                    {{ __('Minhas Experiêcias') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('app.educations') }}" :active="request()->routeIs('app.educations')">
                    {{ __('Meus Cursos') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('app.dash')" :active="request()->routeIs('company.dash')">
                    {{ __('Home') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('company.profile') }}" :active="request()->routeIs('app.perfil')">
                    {{ __('Meu Perfil') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('company.jobs') }}" :active="request()->routeIs('app.perfil')">
                    {{ __('Interessados') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('company.jobs') }}" :active="request()->routeIs('app.perfil')">
                    {{ __('Cadastrar Vagas') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
