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
    @if (!$interested->isEmpty())
        @foreach ($interested as $item)
            <div class="list-of-jobs-container bg-white border-transparent rounded p-4 mb-4">
                <div class="header mb-4">
                    <h1 class="title text-slate-900 font-semibold text-2xl">{{ $item->jobs->title }}</h1>
                </div>
                <hr>
                <div class="my-4">
                    <span class="block w-full font-bold">Descrição</span>
                    <div class="text-gray-600 line-clamp-3">
                        {{ $item->jobs->description }}
                    </div>
                </div>

                <hr>
                <div class="info p-4 flex justify-between items-center">
                    <div class="salary">
                        <span class="font-bold block">Salário</span>
                        <span
                            class="text-md text-orange-500">{{ $item->jobs->match == 1 ? 'A Combinar' : number_format($item->jobs->salary, 2, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="view-button mr-3">
                            <a href="{{ route('app.jobitem', ['job' => $item->jobs->slug, 'view' => 'view']) }}"
                                class="flex justify-between items-center p-2 font-semibold bg-blue-500 
                            hover:bg-blue-900 text-sm text-white rounded-md transition duration-150 ease-in">
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
                                    class="flex justify-between items-center p-2 font-semibold bg-red-700 
                            hover:bg-red-900 text-sm text-white rounded-md transition duration-150 ease-in">
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
        <div class="my-4 mx-auto text-center border-t border-gray-200 pt-8">
            <p class="font-semibold text-gray-600 text-sm">Nenhum registro encontrado, candidate-se em uma vaga agora
                mesmo!</p>
        </div>
    @endif

    {{ $interested->links() }}
</x-app-layout>
