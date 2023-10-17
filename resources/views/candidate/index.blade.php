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

    <div class="flex flex-col justify-end space-y-2 filters md:flex-row md:space-x-6 md:space-y-0">
        <div class="w-full md:w-1/3">
            <form method="GET">
                <select onchange="this.form.submit()" name="category" class="w-full px-4 py-2 border border-gray-200 rounded-xl">
                    <option value="All">Todas as categorias</option>
                    @foreach ($categories as $cat)
                        <option {{ $category == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">
                            {{ $cat->title }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div> <!-- end filters -->

    <div class="my-6 space-y-6 jobs-container">
        @if (!$jobs->isEmpty())
            @foreach ($jobs as $job)
                <div
                    class="flex transition duration-150 ease-in bg-white border border-blue-500 job-container hover:shadow-card rounded-xl">
                    <div class="flex flex-1 px-2 py-6">
                        <div class="w-full mx-4">
                            <h4 class="text-xl font-semibold">
                                <a href="{{ route('app.jobitem', $job->slug) }}"
                                    class="cursor-pointer hover:underline">{{ $job->title }}</a>
                            </h4>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                                    <div>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</div>
                                    <div>&bull;</div>
                                    <div>{{ $job->categories }}</div>
                                </div>
                            </div>

                            <div class="flex items-center mt-4">
                                <div class="mr-4">
                                    <img src="{{ url('media/avatars/' . $job->cover) }}" alt="avatar"
                                        class="w-12 h-12 rounded-full">
                                </div>
                                <div>
                                    <h6>{{ $job->fantasy }}</h6>
                                </div>
                            </div>

                            <div class="mt-4 text-gray-600 line-clamp-3">
                                {{ $job->description }}
                            </div>

                            <div class="flex flex-col justify-between mt-4 space-x-2 md:flex-row md:items-center">
                                <div class="mb-2 md:mb-0">
                                    <span class="block font-bold">Salário</span>
                                    <span
                                        class="text-orange-500 text-md">{{ $job->match == 1 ? 'A Combinar' : number_format($job->salary, 2, ',', '.') }}</span>
                                </div>
                                <a href="{{ route('app.jobitem', $job->slug) }}"
                                    class="px-6 py-2 text-center text-white transition duration-150 ease-in bg-green-600 rounded-full hover:bg-green-900">
                                    Ver informações da vaga
                                </a>
                            </div>

                        </div>
                    </div>
                </div><!-- job-container -->
            @endforeach
        @else
            <div class="pt-8 mx-auto my-4 text-center border-t border-gray-200">
                <p class="text-sm font-semibold text-gray-600">Nenhum registro encontrado, fique atento, logo aqui terá
                    várias vagas de emprego!</p>
            </div>
        @endif

        <div class="my-8">{{ $jobs->links() }}</div>
    </div><!-- end jobs-container -->
</x-app-layout>
