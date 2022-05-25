<x-app-layout>
    <div class="experiencies-container bg-white rounded-lg px-6 py-3 ">

        <div class="header-vacancy-item flex w-full justify-between items-center border-b border-gray-200 py-4 mb-4">
            <div>
                <h2 class="font-bold text-xl">Nova Experiência</h2>
            </div>
        </div>

        <form action="{{ route('app.store.experiences') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form flex flex-col py-4">

                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="font-semibold block mb-1">Título</label>
                    <input type="text" name="title" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Ex: Atendente de Supermercado">
                </div>

                {{-- Company --}}
                <div class="mb-6">
                    <label for="company" class="font-semibold block mb-1">Nome da Empresa</label>
                    <input type="text" name="company" class="w-full rounded-md bg-gray-100 border border-gray-200"
                        placeholder="Ex: Supermercado Estrela Azul">
                </div>


                {{-- Address --}}
                <div class="mb-6">
                    <label for="city" class="font-semibold block mb-1">Localidade</label>
                    <input type="text" name="city" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Ex: Registro-SP">
                </div>

                <div class="form-group flex mb-6 items-center">
                    {{-- Start --}}
                    <div class="flex flex-col w-1/3 mr-2">
                        <label for="start" class="font-semibold mb-1">Data de início</label>
                        <input type="date" name="start" class="rounded-md bg-gray-100 border border-gray-200 w-full">
                    </div>
                    {{-- End --}}
                    <div class="flex flex-col w-1/3 mr-2">
                        <label for="end" class="font-semibold mb-1">Data de término</label>
                        <input type="date" name="end" class="rounded-md bg-gray-100 border border-gray-200 w-full">
                    </div>
                    <div class="flex w-1/3 form-check mt-6 pl-4">
                        <input
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                            Atualmente
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="description" class="font-semibold mb-1 block">Descricao</label>
                    <textarea name="description" rows="10" class="rounded-md bg-gray-100 border border-gray-200 w-full" style="resize:none;"
                        placeholder="Digite uma breve descrição do que fazia..."></textarea>
                </div>


                <div class="flex items-center justify-end">
                    <a href="{{ route('app.experiences') }}"
                        class="flex justify-center items-center p-2 mr-2 font-semibold bg-red-700 hover:bg-red-900 text-sm text-white rounded-md transition duration-150 ease-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <span class="ml-2 capitalize text-md">Cancelar</span>
                    </a>
                    <button type="submit"
                        class="flex justify-center items-center p-2 font-semibold bg-lime-700 hover:bg-lime-900 text-sm text-white rounded-md transition duration-150 ease-in">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="ml-2 capitalize text-md">Salvar Experiência</span>
                    </button>
                </div>
            </div>
        </form>

    </div><!-- end Experiencies Container -->
</x-app-layout>
