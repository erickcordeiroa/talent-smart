<x-admin-layout>
    <a href="{{ route('company.dash') }}"
        class="flex items-center justify-between w-40 mb-4 text-sm font-bold hover:underline">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7">
            </path>
        </svg>
        <span class="block">Todos os Candidatos</span>
    </a>

    <div class="w-full px-6 py-4 mb-2 bg-white border border-gray-100 rounded-xl">
        <div class="flex flex-col items-center justify-between w-full mb-4 text-center md:text-left md:flex-row">
            <div class="mb-2 md:w-32 md:mr-4 md:mb-0">
                @if ($user->photo != null)
                    <img class="object-cover w-24 rounded-full" src="{{ url('media/avatars/' . $user->photo) }}"
                        alt="{{ $user->name }}" />
                @else
                    <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                        alt="{{ $user->name }}">
                @endif
            </div>
            <div class="w-1/2 mb-4 md:mb-0">
                <div class="mb-2">
                    <h2 class="font-bold text-md">{{ $user->name }}</h2>
                    <h5 class="font-normal text-orange-500 text-md">{{ $user->profile }}</h5>
                </div>
                <div>
                    <span class="text-sm">E-mail</span>
                    <h2 class="font-bold text-md">{{ $user->email }}</h2>
                </div>
            </div>

            <div class="w-1/2">
                <div>
                    <span class="text-sm">Carteira Motorista</span>
                    <h2 class="mb-4 font-bold text-md">{{ $user->license }}</h2>
                </div>
                <div>
                    <span class="text-sm">Telefone</span>
                    <h2 class="font-bold text-md">{{ $user->phone }}</h2>
                </div>
            </div>
        </div>
        <div class="mb-4 description">
            {{ $user->description }}
        </div>
    </div>

    <div x-data="{ isExperience: true, isEducation: false }">
        <nav class="flex-col items-center justify-between py-4 text-xs md:flex-row md:flex">

            <ul class="block mb-10 md:hidden md:mb-0">
                <li><a href="#"
                        class="block px-10 py-3 font-bold text-center text-white bg-blue-800 hover:bg-blue-900 rounded-xl text-md">Selecionar
                        Candidato</a></li>
            </ul>

            <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
                <li @click="isExperience = true, isEducation = false">
                    <a href="#" class="pb-3 border-b-4 hover:border-blue-500"
                        :class="isExperience ? 'border-blue-500' : ''">Experiências</a>
                </li>
                <li @click="isExperience = false, isEducation = true">
                    <a href="#" :class="isEducation ? 'border-blue-500' : ''"
                        class="pb-3 transition duration-500 ease-in border-b-4 hover:border-blue-500 ">Cursos</a>
                </li>
            </ul>

            <ul class="hidden mb-10 md:mb-0 md:flex">
                <li>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{ $user->phone }}"
                        class="flex items-center justify-center px-10 py-3 font-bold text-center text-white bg-green-800 hover:bg-green-900 rounded-xl text-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span>Conversar com o Candidato</span>
                    </a>
                </li>
                <li class="ml-2">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{ $user->phone }}"
                        class="flex items-center justify-center px-10 py-3 font-bold text-center text-white bg-indigo-600 hover:bg-indigo-900 rounded-xl text-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                            </path>
                        </svg>
                        <span>Download Curriculo</span>
                    </a>
                </li>
            </ul>
        </nav>

        {{-- Experiencies --}}
        <div x-cloak x-show.transition.origin.top.left="isExperience"
            class="px-6 py-3 bg-white rounded-lg experiencies-container ">
            @if (!$experiences->isEmpty())
                @foreach ($experiences as $item)
                    <div class="flex flex-col w-full py-4 mt-4 border-b border-gray-200 experience-container">
                        {{-- Informations displayed --}}

                        {{-- Job Title And Icons Edit/Remove --}}
                        <div class="flex items-center justify-center">
                            <div class="w-full">
                                <h1 class="mb-3 text-2xl font-semibold md:text-3xl md:mb-0">{{ $item->title }}</h1>
                            </div>
                        </div>

                        {{-- Company name --}}
                        <h2 class="font-bold">{{ $item->company }}</h2>
                        {{-- Date --}}
                        @if ($item->currently == 1)
                            <h3 class="text-gray-400">{{ date('d/M', strtotime($item->start)) }} -
                                Atualmente</h3>
                        @else
                            <h3 class="text-gray-400">{{ date('d/M', strtotime($item->start)) }} -
                                {{ date('d/M', strtotime($item->end)) }}</h3>
                        @endif

                        {{-- Location --}}
                        <h3 class="text-gray-400">{{ $item->city }}</h3>
                        {{-- Description --}}
                        <p class="my-4">{{ $item->description }}</p>
                        {{-- I need to check this section to make sure it is with properly colours and formating --}}

                    </div><!-- end Experience-Container -->
                @endforeach
            @else
                <div class="mx-auto my-4 text-center">
                    <p class="text-sm font-semibold text-gray-600">O candidato não tem nenhuma experiência cadastrada no
                        momento!</p>
                </div>
            @endif
        </div><!-- end Experiencies Container -->

        {{-- Educations --}}
        <div x-cloak x-show.transition.origin.top.left="isEducation"
            class="px-6 py-3 bg-white rounded-lg educations-container ">
            @if (!$educations->isEmpty())
                @foreach ($educations as $item)
                    <div class="flex flex-col w-full mt-4 border-b border-gray-200 education-container">

                        {{-- Informations displayed --}}

                        {{-- Job Title And Icons Edit/Remove --}}
                        <div class="flex items-center justify-center">
                            <div class="w-full">
                                <h1 class="text-2xl font-semibold md:text-3xl">{{ $item->title }}</h1>
                            </div>
                        </div>

                        {{-- Company name --}}
                        <h2 class="font-bold">{{ $item->company }}</h2>
                        {{-- Date --}}
                        <h3 class="text-gray-400">{{ date('d/M', strtotime($item->start)) }} -
                            {{ date('d/M', strtotime($item->end)) }}</h3>
                        {{-- Degree --}}
                        <h3 class="text-gray-400">{{ $item->degree }}</h3>
                        {{-- Description --}}
                        <p class="my-4 line-clamp-3">{{ $item->description }}</p>

                    </div><!-- end education-Container -->
                @endforeach
            @else
                <div class="mx-auto my-4 text-center">
                    <p class="text-sm font-semibold text-gray-600">O candidato não tem nenhum curso cadastrado no
                        momento!
                    </p>
                </div>
            @endif
        </div><!-- end Educations Container -->
    </div>

</x-admin-layout>
