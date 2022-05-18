<x-app-layout>
    <div class="educations-container bg-white rounded-lg p-6 ">
        <div class="header-vacancy-item h-12 flex w-full justify-between items-center border-b border-gray-200">
            <div>
                <h2 class="font-bold text-xl">Cursos</h2>
            </div>
            <div>
                <a href="#"
                    class="flex justify-between items-center p-2 font-semibold bg-lime-700 hover:bg-lime-900 text-sm text-white rounded-md transition duration-150 ease-in">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="ml-2">Novo Curso</span>
                </a>
            </div>
        </div>

        <div class="education-container mt-4 w-full flex flex-col border-b border-gray-200">
            {{-- Informations displayed --}}

            {{-- Job Title And Icons Edit/Remove --}}
            <div class="flex justify-center items-center">
                <div class="w-full">
                    <h1 class="font-semibold text-3xl">Desenvolvimento Web HTML/CSS</h1>
                </div>
                <div class="w-1/12 flex">
                    <a href="#" class="mr-2 text-gray-400 hover:text-blue-500 transition duration-150 ease-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-500 transition duration-150 ease-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Company name --}}
            <h2 class="font-bold">B7Web</h2>
            {{-- Date --}}
            <h3 class="text-gray-400">nov. de 2011 - jan. de 2022</h3>
            {{-- Location --}}
            <h3 class="text-gray-400">Online</h3>
            {{-- Description --}}
            <p class="my-4 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam dignissimos
                officiis
                suscipit. Nisi error maxime saepe, sit consequatur provident esse eius optio impedit, atque illum
                obcaecati laboriosam quia facere et.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam
                dignissimos officiis suscipit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam
                dignissimos officiis
                suscipit. Nisi error maxime saepe, sit consequatur provident esse eius optio impedit, atque illum
                obcaecati laboriosam quia facere et.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam
                dignissimos officiis suscipit.</p>
            {{-- I need to check this section to make sure it is with properly colours and formating --}}
        </div><!-- end education-Container -->

        
    </div><!-- end Educations Container -->
</x-app-layout>
