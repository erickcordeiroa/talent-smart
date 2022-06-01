<x-app-layout>
    @if ($errors->any())
        <div class="w-full mb-4 rounded-lg border border-red-500 bg-red-400 p-3 text-white">
            <h5 class="text-white font-bold text-3xl mb-2">Atenção!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="w-full mb-4 rounded-lg border border-green-500 bg-green-400 p-3 text-white">
            <h5 class="text-white font-bold text-3xl mb-2">Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="educations-container bg-white rounded-lg px-6 py-3 ">
        <div class="header-vacancy-item h-12 flex w-full justify-between items-center border-b border-gray-200 pb-2">
            <div>
                <h2 class="font-bold text-xl">Cursos</h2>
            </div>
            <div>
                <a href="{{ route('app.create.educations') }}"
                    class="flex justify-between items-center p-2 font-semibold bg-lime-700 hover:bg-lime-900 text-sm text-white rounded-md transition duration-150 ease-in">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="ml-2">Novo Curso</span>
                </a>
            </div>
        </div>
        @if (!$educations->isEmpty())
            @foreach ($educations as $item)
                <div class="education-container mt-4 w-full flex flex-col border-b border-gray-200">


                    {{-- Informations displayed --}}

                    {{-- Job Title And Icons Edit/Remove --}}
                    <div class="flex justify-center items-center">
                        <div class="w-full">
                            <h1 class="font-semibold text-2xl md:text-3xl">{{ $item->title }}</h1>
                        </div>
                        <div class="hidden w-1/12 md:flex">
                            <a href="{{ route('app.edit.educations', $item) }}"
                                class="mr-2 text-gray-400 hover:text-blue-500 transition duration-150 ease-in">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <form action="{{ route('app.destroy.educations', ['id' => $item->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Você deseja realmente excluir esse registro?')"
                                    class="text-gray-400 hover:text-red-500 transition duration-150 ease-in">
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
                    {{-- Date --}}
                    <h3 class="text-gray-400">{{ date('d/M', strtotime($item->start)) }} -
                        {{ date('d/M', strtotime($item->end)) }}</h3>
                    {{-- Degree --}}
                    <h3 class="text-gray-400">{{ $item->degree }}</h3>
                    {{-- Description --}}
                    <p class="my-4 line-clamp-3">{{ $item->description }}</p>

                    {{-- Responsive Buttons --}}
                    <div class="w-full flex md:hidden items-center justify-center">
                        <a href="{{ route('app.edit.educations', ['id' => $item->id]) }}"
                            class="w-1/2 flex bg-blue-500 mr-2 text-white py-2 px-8 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span>Alterar</span>
                        </a>
                        <form class="w-1/2 flex bg-red-500 mr-2 text-white py-2 px-8 rounded-xl"
                            action="{{ route('app.destroy.educations', ['id' => $item->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                onclick="return confirm('Você deseja realmente excluir esse registro?')"
                                class="flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                <span>Excluir</span>
                            </button>
                        </form>
                    </div>

                </div><!-- end education-Container -->
            @endforeach
        @else
            <div class="my-4 mx-auto text-center">
                <p class="font-semibold text-gray-600 text-sm">Nenhum registro encontrado, cadastre seu primeiro
                    curso!</p>
            </div>
        @endif

        <div class="my-8">{{ $educations->links() }}</div>
    </div><!-- end Educations Container -->

</x-app-layout>
