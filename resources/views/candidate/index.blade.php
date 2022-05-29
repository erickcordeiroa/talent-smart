<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border border-gray-200">
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Procure a vaga que deseja"
                class="w-full placeholder-gray-900 rounded-xl bg-white border border-gray-200 px-4 py-2 pl-8" name=""
                id="">

            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->

    <div class="jobs-container space-y-6 my-6">
        @if (!$jobs->isEmpty())
            @foreach ($jobs as $item)
                <div
                    class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex border border-blue-500">
                    <div class="flex flex-1 px-2 py-6">
                        <div class="w-full mx-4">
                            <h4 class="text-xl font-semibold">
                                <a href="{{ route('app.jobitem', $item) }}"
                                    class="hover:underline cursor-pointer">{{ $item->title }}</a>
                            </h4>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                    <div>{{ $item->created_at->diffForHumans() }}</div>
                                    <div>&bull;</div>
                                    <div>{{ $item->categories }}</div>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center">
                                <div class="mr-4">
                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="avatar"
                                        class="w-12 h-12 rounded-full">
                                </div>
                                <div>
                                    <h6>{{ $item->fantasy }}</h6>
                                </div>
                            </div>

                            <div class="text-gray-600 mt-4 line-clamp-3">
                                {{ $item->description }}
                            </div>

                            <div class="flex items-center space-x-2 mt-4 justify-between">
                                <div>
                                    <span class="font-bold block">Salário</span>
                                    <span
                                        class="text-md text-orange-500">{{ $item->match == 1 ? 'A Combinar' : number_format($item->salary, 2, ',', '.') }}</span>
                                </div>
                                <a href="{{ route('app.jobitem', ['id' => $item->id]) }}"
                                    class="relative bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
                                    Ver informações da vaga
                                </a>
                            </div>

                        </div>
                    </div>
                </div><!-- job-container -->
            @endforeach
        @else
            <div class="my-4 mx-auto text-center border-t border-gray-200 pt-8">
                <p class="font-semibold text-gray-600 text-sm">Nenhum registro encontrado, fique atento, logo aqui terá
                    várias vagas de emprego
                    experiência!</p>
            </div>
        @endif

        <div class="my-8">{{ $jobs->links() }}</div>
    </div><!-- end jobs-container -->
</x-app-layout>
