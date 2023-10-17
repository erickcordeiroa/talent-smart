<x-app-layout>
    <a href="{{ (Request::query('view') != 'view')? route('app.dash') : route('app.jobs') }}"
        class="flex items-center justify-between w-32 mb-4 text-sm font-bold hover:underline">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7">
            </path>
        </svg>
        <span class="block">
            {{ (Request::query('view') != 'view')? 'Todas as Vagas' : 'Minhas vagas' }}</span>
    </a>
    <div class="flex transition duration-150 ease-in bg-white job-container hover:shadow-card rounded-xl">
        <div class="flex flex-1 px-2 py-6">
            <div class="w-full mx-4">
                {{-- Title Job --}}
                <h4 class="text-2xl font-semibold">{{ $job->title }}</h4>

                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                        <div>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $job->categories->title }}</div>
                    </div>
                </div>

                {{-- Company Job --}}
                <div class="flex items-center mt-4">
                    <div class="mr-4">
                        <img src="{{ url('media/avatars/' . $job->clients->cover) }}" alt="avatar"
                            class="w-12 h-12 rounded-full">
                    </div>
                    <div>
                        <h6 class="font-semibold">{{ $job->clients->fantasy }}</h6>
                    </div>
                </div>

                {{-- Location and Salary --}}
                <div class="flex items-center mt-4">
                    <div class="mr-12">
                        <span class="block font-bold text-md">Localização:</span>
                        <h6 class="text-sm text-orange-500">{{ $job->city }}</h6>
                    </div>
                    <div>
                        <span class="block font-bold text-md">Salário:</span>
                        <h6 class="text-sm text-orange-500">
                            {{ $job->match == 1 ? 'A Combinar' : number_format($job->salary, 2, ',', '.') }}</h6>
                    </div>
                </div>

                {{-- Benefits --}}
                <div class="mt-4">
                    <span class="block mb-2 font-bold text-md">Benefícios:</span>

                    <div class="flex flex-wrap items-center justify-start w-full">

                        <div
                            class="{{ $job->transport ? 'flex' : 'hidden' }} w-full md:w-1/4 md:justify-betstartween items-center my-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vale Transporte
                        </div>
                        <div
                            class="{{ $job->food ? 'flex' : 'hidden' }} w-full md:w-1/4 md:justify-start items-center my-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vale Refeição
                        </div>
                        <div
                            class="{{ $job->snack ? 'flex' : 'hidden' }} w-full md:w-1/4 md:justify-start items-center my-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vale Alimentação
                        </div>
                        <div
                            class="{{ $job->health ? 'flex' : 'hidden' }} w-full md:w-1/4 md:justify-start items-center my-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Convênio Médico
                        </div>
                    </div>

                </div>

                {{-- Description --}}
                <div class="mt-4 description-job">
                    <span class="block font-bold text-md">Descrição:</span>
                    <p class="text-gray-600">
                        {{ $job->description }}
                    </p>
                </div>

                {{-- Button Candidatar --}}
                @if(Request::query('view') != 'view')
                <div class="flex items-center justify-center mt-4 md:justify-end">
                    <form action="{{ route('app.link') }}" method="post">
                    @csrf
                    <input type="hidden" name="job" value="{{ $job->id }}">
                    <button type="submit"
                        class="relative px-6 py-2 text-white transition duration-150 ease-in bg-green-600 rounded-full hover:bg-green-900">
                        Quero me candidatar a vaga
                    </button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div><!-- job-container -->
</x-app-layout>
