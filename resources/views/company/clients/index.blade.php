<x-admin-layout>
    @if ($errors->any())
        <div class="w-full p-3 mb-4 text-white bg-red-400 border border-red-500 rounded-lg">
            <h5 class="mb-2 text-3xl font-bold text-white">Atenção!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="w-full p-3 mb-4 text-green-800 bg-green-400 border border-green-500 rounded-lg">
            <h5 class="mb-2 text-3xl font-bold text-green-800">Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="px-6 py-3 bg-white rounded-lg experiencies-container ">

        <div class="flex items-center justify-between w-full h-12 header-vacancy-item">
            <div>
                <h2 class="text-xl font-bold">Lista de Clientes</h2>
            </div>
            <div>
                <a href="{{ route('company.create.clients') }}"
                    class="flex items-center justify-between p-2 text-sm font-semibold text-white transition duration-150 ease-in rounded-md bg-lime-700 hover:bg-lime-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="ml-2">Novo Cliente</span>
                </a>
            </div>
        </div>

        @if (!$clients->isEmpty())
            @foreach ($clients as $item)
                <div class="flex flex-col w-full py-4 mt-4 border-t border-gray-200 experience-container">
                    {{-- Informations displayed --}}

                    {{-- Job Title And Icons Edit/Remove --}}
                    <div class="flex items-center justify-center">
                        <div class="w-full">
                            <h1 class="text-2xl font-semibold md:text-3xl">{{ $item->fantasy }}</h1>
                        </div>
                        <div class="hidden w-1/12 md:flex">
                            <a href="{{ route('company.edit.clients', $item) }}"
                                class="mr-2 text-gray-400 transition duration-150 ease-in hover:text-blue-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <form action="{{ route('company.destroy.clients', ['id' => $item->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Você deseja realmente excluir esse registro?')"
                                    class="text-gray-400 transition duration-150 ease-in hover:text-red-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Company name --}}
                    <h2 class="font-bold">{{ $item->company }}</h2>
                    {{-- Location --}}
                    <h3 class="text-gray-400">{{ $item->document }}</h3>
                    {{-- Description --}}
                    <p class="my-2 line-clamp-3">{{ $item->email }}</p>

                    {{-- Responsive Buttons --}}
                    <div class="flex items-center justify-center w-full md:hidden">
                        <a href="{{ route('company.edit.clients', $item) }}"
                            class="flex w-1/2 px-8 py-2 mr-2 text-white bg-blue-500 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span>Alterar</span>
                        </a>
                        <form class="flex w-1/2 px-8 py-2 mr-2 text-white bg-red-500 rounded-xl"
                            action="{{ route('company.destroy.clients', ['id' => $item->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                onclick="return confirm('Você deseja realmente excluir esse registro?')" class="flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                <span>Excluir</span>
                            </button>
                        </form>
                    </div>
                    {{-- I need to check this section to make sure it is with properly colours and formating --}}
                </div><!-- end Experience-Container -->
            @endforeach
        @else
            <div class="pt-8 mx-auto my-4 text-center border-t border-gray-200">
                <p class="text-sm font-semibold text-gray-600">Nenhum registro encontrado, cadastre seu primeiro
                    cliente!</p>
            </div>
        @endif
    </div><!-- end Experiencies Container -->
    <div class="my-8">
        {{ $clients->links() }}
    </div>
</x-admin-layout>
