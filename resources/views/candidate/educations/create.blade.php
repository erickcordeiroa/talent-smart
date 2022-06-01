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

    <div class="educations-container bg-white rounded-lg px-6 py-3 ">

        <div class="header-vacancy-item flex w-full justify-between items-center border-b border-gray-200 py-4 mb-4">
            <div>
                <h2 class="font-bold text-xl">Novo Curso</h2>
            </div>
        </div>

        <form action="{{ route('app.store.educations') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form flex flex-col py-4">

                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="font-semibold block mb-1">Título</label>
                    <input type="text" name="title" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Ex: Atendente de Supermercado" value="{{ old('title') }}">
                </div>

                {{-- Degree --}}
                <div class="mb-6">
                    <label for="degree" class="font-semibold block mb-1">Diploma</label>
                    <input type="text" name="degree" class="w-full rounded-md bg-gray-100 border border-gray-200"
                        placeholder="Ex: Bacharelado" value="{{ old('degree') }}">
                </div>

                {{-- Company --}}
                <div class="mb-6">
                    <label for="company" class="font-semibold block mb-1">Nome da Instituição</label>
                    <input type="text" name="company" class="w-full rounded-md bg-gray-100 border border-gray-200"
                        placeholder="Ex: Udemy" value="{{ old('company') }}">
                </div>


                <div class="form-group flex mb-6 items-center">
                    {{-- Start --}}
                    <div class="flex flex-col w-1/2 mr-2">
                        <label for="start" class="font-semibold mb-1">Data de início</label>
                        <input type="date" name="start" class="rounded-md bg-gray-100 border border-gray-200 w-full" value="{{ old('start') }}">
                    </div>
                    {{-- End --}}
                    <div class="flex flex-col w-1/2 mr-2">
                        <label for="end" class="font-semibold mb-1">Data de término</label>
                        <input type="date" name="end" class="rounded-md bg-gray-100 border border-gray-200 w-full" value="{{ old('end') }}">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="description" class="font-semibold mb-1 block">Descricao</label>
                    <textarea name="description" rows="10" class="rounded-md bg-gray-100 border border-gray-200 w-full" style="resize:none;"
                        placeholder="Digite uma breve descrição do que você aprenderá/aprendeu...">{{ old('description') }}</textarea>
                </div>


                <div class="flex items-center justify-end">
                    <a href="{{ route('app.educations') }}"
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
                        <span class="ml-2 capitalize text-md">Salvar Curso</span>
                    </button>
                </div>
            </div>
        </form>

    </div><!-- end Educations Container -->
</x-app-layout>
