<x-admin-layout>
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

    <div class="experiencies-container bg-white rounded-lg px-6 py-3 ">

        <div class="header-vacancy-item h-12 flex w-full justify-between items-center">
            <div>
                <h2 class="font-bold text-xl">Lista de Interessados</h2>
            </div>
        </div>

        @if (!$interested->isEmpty())
            @foreach ($interested as $item)
                <div class="experience-container mt-4 w-full flex flex-col border-t border-gray-200 py-4">
                    {{-- Informations displayed --}}
                    <div class="flex items-center justify-between">
                        {{-- Image and Name Profile --}}
                        <div class="w-1/4 flex items-center justify-between">
                            <div class="w-2/6 mr-4">
                                @if ($item->photo != null)
                                    <img class="w-12     rounded-full object-cover"
                                        src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" />
                                @else
                                    <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                                        alt="{{ $item->name }}">
                                @endif
                            </div>
                            <div class="w-full">
                                <h2 class="text-md font-bold">{{ $item->name }}</h2>
                                <h5 class="text-sm font-normal text-orange-500">{{ $item->profile }}</h5>
                            </div>
                        </div>

                        <div class="w-1/3">
                            <h2 class="text-md font-bold">{{ $item->title }}</h2>
                        </div>

                        <div class="w-1/3 flex items-center space-x-1 justify-end">
                            <a href="{{ route('company.user', ['user' => $item->slug]) }}"
                                class="text-xs px-2 py-1 rounded-xl bg-yellow-400 text-black">Ver perfil</a>
                            {{-- <span class="text-xs px-2 py-1 rounded-xl bg-green-500 text-white">Aprovar</span> --}}
                            <form action="{{ route('company.interested.destroy', ['id' => $item->id]) }}"
                                onclick="return confirm('Você deseja realmente excluir esse registro?')"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-xs px-2 py-1 rounded-xl bg-red-500 text-white">Reprovar</button>
                            </form>

                        </div>
                    </div>
                </div><!-- end Experience-Container -->
            @endforeach
        @else
            <div class="my-4 mx-auto text-center border-t border-gray-200 pt-8">
                <p class="font-semibold text-gray-600 text-sm">Nenhum registro encontrado, volte aqui mais tarde!</p>
            </div>
        @endif
    </div><!-- end Experiencies Container -->
    <div class="my-8">
        {{ $interested->links() }}
    </div>
</x-admin-layout>
