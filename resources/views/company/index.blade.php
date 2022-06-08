<x-admin-layout>
    <div class="filters justify-end flex flex-col md:flex-row mb-2">
        <div class="md:w-1/3 w-full">
            <form method="GET">
                <select onchange="this.form.submit()" name="profile"
                    class="w-full rounded-xl px-4 py-2 border border-gray-200">
                    <option {{ $profile === 'All' ? 'selected' : '' }} value="All">Todos os Perfils</option>
                    <option {{ $profile === 'Condescendente' ? 'selected' : '' }} value="Condescendente">Condescendente</option>
                    <option {{ $profile === 'Dominante' ? 'selected' : '' }} value="Dominante">Dominante</option>
                    <option {{ $profile === 'Estável' ? 'selected' : '' }} value="Estável">Estável</option>
                    <option {{ $profile === 'Influente' ? 'selected' : '' }} value="Influente">Influente</option>
                </select>
            </form>
        </div>
    </div> <!-- end filters -->

    <div class="flex justify-between items-center flex-wrap">
        @if (!$candidates->isEmpty())
            @foreach ($candidates as $item)
                <div class="w-full md:w-49/5 bg-white border border-gray-100 rounded-xl py-4 px-6 mb-2">
                    <div class="w-full flex items-center justify-between mb-4">
                        <div class="w-2/6 mr-4">
                            @if ($item->photo != null)
                                <img class="w-24 rounded-full object-cover"
                                    src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" />
                            @else
                                <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                                    alt="{{ $item->name }}">
                            @endif
                        </div>
                        <div class="w-full">
                            <h2 class="text-md font-bold">{{ $item->name }}</h2>
                            <h5 class="text-md font-normal text-orange-500">{{ $item->profile }}</h5>
                        </div>
                    </div>
                    <div class="description line-clamp-3 mb-4">
                        {{ $item->description }}
                    </div>
                    <a href="{{ route('company.user', $item) }}"
                        class="block py-3 px-6 text-center bg-blue-800 text-white rounded-lg">Ver perfil completo</a>
                </div>
            @endforeach
        @else
            <div class="my-4 mx-auto text-center pt-8">
                <p class="font-semibold text-gray-600 text-sm">Nenhum registro encontrado, fique atento, logo aqui terá
                    vários candidatos!</p>
            </div>
        @endif

        <div class="my-8">
            {{ $candidates->links() }}
        </div>
    </div>
</x-admin-layout>
