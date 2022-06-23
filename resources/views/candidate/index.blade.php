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

    <div class="filters justify-end flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0">
        <div class="md:w-1/3 w-full">
            <form method="GET">
                <select onchange="this.form.submit()" name="category" class="w-full rounded-xl px-4 py-2 border border-gray-200">
                    <option value="All">Todas as categorias</option>
                    @foreach ($categories as $cat)
                        <option {{ $category == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">
                            {{ $cat->title }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div> <!-- end filters -->

    <div class="jobs-container space-y-6 my-6">
        @if (!$jobs->isEmpty())
            @foreach ($jobs as $job)
                <div
                    class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex border border-blue-500">
                    <div class="flex flex-1 px-2 py-6">
                        <div class="w-full mx-4">
                            <h4 class="text-xl font-semibold">
                                <a href="{{ route('app.jobitem', $job->slug) }}"
                                    class="hover:underline cursor-pointer">{{ $job->title }}</a>
                            </h4>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                    <div>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</div>
                                    <div>&bull;</div>
                                    <div>{{ $job->categories }}</div>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center">
                                <div class="mr-4">
                                    <img src="{{ url('media/avatars/' . $job->photo) }}" alt="avatar"
                                        class="w-12 h-12 rounded-full">
                                </div>
                                <div>
                                    <h6>{{ $job->fantasy }}</h6>
                                </div>
                            </div>

                            <div class="text-gray-600 mt-4 line-clamp-3">
                                {{ $job->description }}
                            </div>

                            <div class="flex flex-col md:flex-row md:items-center space-x-2 mt-4 justify-between">
                                <div class="mb-2 md:mb-0">
                                    <span class="font-bold block">Salário</span>
                                    <span
                                        class="text-md text-orange-500">{{ $job->match == 1 ? 'A Combinar' : number_format($job->salary, 2, ',', '.') }}</span>
                                </div>
                                <a href="{{ route('app.jobitem', $job->slug) }}"
                                    class="text-center bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
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
                    várias vagas de emprego!</p>
            </div>
        @endif

        <div class="my-8">{{ $jobs->links() }}</div>
    </div><!-- end jobs-container -->
</x-app-layout>
