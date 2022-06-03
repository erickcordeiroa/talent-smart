<x-admin-layout>
    <a href="{{ route('company.dash') }}"
        class="hover:underline flex items-center justify-between w-40 font-bold text-sm mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7">
            </path>
        </svg>
        <span class="block">Todos os Candidatos</span>
    </a>

    <div class="w-full bg-white border border-gray-100 rounded-xl py-4 px-6 mb-2">
        <div class="w-full flex items-center justify-between mb-4">
            <div class="w-32 mr-4">
                @if ($user->photo != null)
                    <img class="w-24 rounded-full object-cover" src="{{ asset('storage/' . $user->photo) }}"
                        alt="{{ $user->name }}" />
                @else
                    <img class="inline rounded-full" src="{{ asset('img/default-user.png') }}"
                        alt="{{ $user->name }}">
                @endif
            </div>
            <div class="w-1/2">
                <div class="mb-2">
                    <h2 class="text-md font-bold">{{ $user->name }}</h2>
                    <h5 class="text-md font-normal text-orange-500">{{ $user->profile }}</h5>
                </div>
                <div>
                    <span class="text-sm">E-mail</span>
                    <h2 class="text-md font-bold">{{ $user->email }}</h2>
                </div>
            </div>

            <div class="w-1/2">
                <div>
                    <span class="text-sm">Carteira Motorista</span>
                    <h2 class="text-md font-bold mb-4">A/B</h2>
                </div>
                <div>
                    <span class="text-sm">Telefone</span>
                    <h2 class="text-md font-bold">{{ $user->phone }}</h2>
                </div>
            </div>
        </div>
        <div class="description mb-4">
            {{ $user->description }}
        </div>
    </div>

    <div x-data="{ isExperience: true, isEducation: false }">
        <nav class=" md:flex items-center justify-between text-xs py-4">
            <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                <li @click="isExperience = true, isEducation = false">
                    <a href="#" class="border-b-4 pb-3 hover:border-blue-500"
                        :class="isExperience ? 'border-blue-500' : ''">Experiências</a>
                </li>
                <li @click="isExperience = false, isEducation = true">
                    <a href="#" :class="isEducation ? 'border-blue-500' : ''"
                        class="transition duration-500 ease-in border-b-4 pb-3 hover:border-blue-500 ">Cursos</a>
                </li>
            </ul>
        </nav>

        {{-- Experiencies --}}
        <div x-cloak x-show.transition.origin.top.left="isExperience"
            class="experiencies-container bg-white rounded-lg px-6 py-3 ">
            @if (!$experiences->isEmpty())
                @foreach ($experiences as $item)
                    <div class="experience-container mt-4 w-full flex flex-col border-b border-gray-200 py-4">
                        {{-- Informations displayed --}}

                        {{-- Job Title And Icons Edit/Remove --}}
                        <div class="flex justify-center items-center">
                            <div class="w-full">
                                <h1 class="font-semibold text-2xl md:text-3xl mb-3 md:mb-0">{{ $item->title }}</h1>
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
                <div class="my-4 mx-auto text-center">
                    <p class="font-semibold text-gray-600 text-sm">O candidato não tem nenhuma experiência cadastrada no
                        momento!</p>
                </div>
            @endif
        </div><!-- end Experiencies Container -->

        {{-- Educations --}}
        <div x-cloak x-show.transition.origin.top.left="isEducation"
            class="educations-container bg-white rounded-lg px-6 py-3 ">
            @if (!$educations->isEmpty())
                @foreach ($educations as $item)
                    <div class="education-container mt-4 w-full flex flex-col border-b border-gray-200">

                        {{-- Informations displayed --}}

                        {{-- Job Title And Icons Edit/Remove --}}
                        <div class="flex justify-center items-center">
                            <div class="w-full">
                                <h1 class="font-semibold text-2xl md:text-3xl">{{ $item->title }}</h1>
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
                <div class="my-4 mx-auto text-center">
                    <p class="font-semibold text-gray-600 text-sm">O candidato não tem nenhum curso cadastrado no
                        momento!
                    </p>
                </div>
            @endif
        </div><!-- end Educations Container -->
    </div>

</x-admin-layout>
