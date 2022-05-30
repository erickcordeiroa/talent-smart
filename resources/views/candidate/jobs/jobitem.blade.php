<x-app-layout>
    <a href="{{ route('app.dash') }}" class="hover:underline flex items-center justify-between w-32 font-bold text-sm mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7">
            </path>
        </svg>
        <span class="block">Todas as Vagas</span>
    </a>
    <div class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex">
        <div class="flex flex-1 px-2 py-6">
            <div class="w-full mx-4">
                {{-- Title Job --}}
                <h4 class="text-2xl font-semibold">{{ $job->title }}</h4>

                <div class="flex items-center justify-between">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $job->categories->title }}</div>
                    </div>
                </div>

                {{-- Company Job --}}
                <div class="mt-4 flex items-center">
                    <div class="mr-4">
                        <img src="{{ asset('storage/' . $job->users->photo) }}" alt="avatar"
                            class="w-12 h-12 rounded-full">
                    </div>
                    <div>
                        <h6 class="font-semibold">{{ $job->users->fantasy }}</h6>
                    </div>
                </div>

                {{-- Location and Salary --}}
                <div class="mt-4 flex items-center">
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
                    <span class="block font-bold text-md mb-2">Benefícios:</span>

                    <div class="w-full flex flex-wrap justify-start items-center">

                        <div class="{{ $job->transport ? 'flex' : 'hidden' }} justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vale Transporte
                        </div>
                        <div class="{{ $job->food ? 'flex' : 'hidden' }} justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vale Refeição
                        </div>
                        <div class="{{ $job->snack ? 'flex' : 'hidden' }} justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vale Alimentação
                        </div>
                        <div class="{{ $job->health ? 'flex' : 'hidden' }} justify-between items-center my-2 mr-2">
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
                <div class="description-job mt-4">
                    <span class="block font-bold text-md">Descrição:</span>
                    <p class="text-gray-600">
                        {{ $job->description }}
                    </p>
                </div>

                {{-- Button Candidatar --}}
                <div class="flex items-center mt-4 justify-end">
                    <a href="#"
                        class="relative bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
                        Quero me candidatar a vaga
                    </a>
                </div>

            </div>
        </div>
    </div><!-- job-container -->
</x-app-layout>
