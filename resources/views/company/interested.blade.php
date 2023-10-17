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
        <div class="w-full p-3 mb-4 text-white bg-green-400 border border-green-500 rounded-lg">
            <h5 class="mb-2 text-3xl font-bold text-white">Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="px-6 py-3 bg-white rounded-lg experiencies-container ">

        <div class="flex items-center justify-between w-full h-12 header-vacancy-item">
            <div>
                <h2 class="text-xl font-bold">Lista de Interessados</h2>
            </div>
        </div>

        @if (!$interested->isEmpty())
            @foreach ($interested as $item)
                <div class="flex flex-col w-full py-4 mt-4 border-t border-gray-200 experience-container">
                    {{-- Informations displayed --}}
                    <div class="flex items-center justify-between">
                        {{-- Image and Name Profile --}}
                        <div class="flex items-center justify-between w-1/4">
                            <div class="w-2/6 mr-4">
                                @if ($item->photo != null)
                                    <img class="object-cover w-12 rounded-full"
                                        src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" />
                                @else
                                    <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                                        alt="{{ $item->name }}">
                                @endif
                            </div>
                            <div class="w-full">
                                <h2 class="font-bold text-md">{{ $item->name }}</h2>
                                <h5 class="text-sm font-normal text-orange-500">{{ $item->profile }}</h5>
                            </div>
                        </div>

                        <div class="w-1/3">
                            <h2 class="font-bold text-md">{{ $item->title }}</h2>
                            <h5 class="text-sm font-normal text-orange-500">{{ $item->fantasy }}</h5>
                        </div>

                        <div class="flex items-center justify-end w-1/3 space-x-1">
                            <a href="{{ route('company.user', ['user' => $item->slug]) }}"
                                class="px-2 py-1 text-xs text-black bg-yellow-400 rounded-xl">Ver perfil</a>
                            {{-- <span class="px-2 py-1 text-xs text-white bg-green-500 rounded-xl">Aprovar</span> --}}
                            <form action="{{ route('company.interested.destroy', ['id' => $item->id]) }}"
                                onclick="return confirm('Você deseja realmente excluir esse registro?')"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 text-xs text-white bg-red-500 rounded-xl">Reprovar</button>
                            </form>

                        </div>
                    </div>
                </div><!-- end Experience-Container -->
            @endforeach
        @else
            <div class="pt-8 mx-auto my-4 text-center border-t border-gray-200">
                <p class="text-sm font-semibold text-gray-600">Nenhum registro encontrado, volte aqui mais tarde!</p>
            </div>
        @endif
    </div><!-- end Experiencies Container -->
    <div class="my-8">
        {{ $interested->links() }}
    </div>
</x-admin-layout>
