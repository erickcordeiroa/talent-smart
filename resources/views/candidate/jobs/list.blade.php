<x-app-layout>
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
        <div class="w-full p-3 mb-4 text-white bg-green-400 border border-green-500 rounded-lg">
            <h5 class="mb-2 text-3xl font-bold text-white">Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif
    @if (!$interested->isEmpty())
        @foreach ($interested as $item)
            <div class="p-4 mb-4 bg-white border-transparent rounded list-of-jobs-container">
                <div class="mb-4 header">
                    <h1 class="text-2xl font-semibold title text-slate-900">{{ $item->jobs->title }}</h1>
                </div>
                <hr>
                <div class="my-4">
                    <span class="block w-full font-bold">Descrição</span>
                    <div class="text-gray-600 line-clamp-3">
                        {{ $item->jobs->description }}
                    </div>
                </div>

                <hr>
                <div class="flex items-center justify-between p-4 info">
                    <div class="salary">
                        <span class="block font-bold">Salário</span>
                        <span
                            class="text-orange-500 text-md">{{ $item->jobs->match == 1 ? 'A Combinar' : number_format($item->jobs->salary, 2, ',', '.') }}</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="mr-3 view-button">
                            <a href="{{ route('app.jobitem', ['job' => $item->jobs->slug, 'view' => 'view']) }}"
                                class="flex items-center justify-between p-2 text-sm font-semibold text-white transition duration-150 ease-in bg-blue-500 rounded-md hover:bg-blue-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                <span class="ml-2">Ver Informações</span>
                            </a>
                        </div>

                        <div class="cancel-button">
                            <form action="{{ route('app.jobitem.destroy', ['id' => $item->id]) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="flex items-center justify-between p-2 text-sm font-semibold text-white transition duration-150 ease-in bg-red-700 rounded-md hover:bg-red-900">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span class="ml-2">Cancelar Aplicação</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end List Jobs -->
        @endforeach
    @else
        <div class="pt-8 mx-auto my-4 text-center border-t border-gray-200">
            <p class="text-sm font-semibold text-gray-600">Nenhum registro encontrado, candidate-se em uma vaga agora
                mesmo!</p>
        </div>
    @endif

    {{ $interested->links() }}
</x-app-layout>
