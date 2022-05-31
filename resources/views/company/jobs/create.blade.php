<x-admin-layout>
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
                <h2 class="font-bold text-xl">Nova Vaga</h2>
            </div>
        </div>

        <form action="{{ route('company.store.jobs') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form flex flex-col py-4">

                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="font-semibold block mb-1">Título</label>
                    <input type="text" name="title" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Ex: Atendente de Supermercado" value="{{ old('title') }}">
                </div>

                {{-- Category --}}
                <div class="mb-6">
                    <label for="category" class="font-semibold block mb-1">Categoria</label>
                    <select required name="category_id" class="w-full rounded-md bg-gray-100 border border-gray-200">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group flex mb-6 items-center">
                    {{-- City --}}
                    <div class="flex flex-col w-1/2 mr-2">
                        <label for="city" class="font-semibold mb-1">Cidade</label>
                        <input type="text" placeholder="Registro" name="city"
                            class="rounded-md bg-gray-100 border border-gray-200 w-full" value="{{ old('city') }}">
                    </div>

                    {{-- Salary --}}
                    <div class="flex flex-col w-1/3 mr-2">
                        <label for="salary" class="font-semibold mb-1">Salário</label>
                        <input type="text" name="salary" placeholder="R$ 3.000,00"
                            class="rounded-md bg-gray-100 border border-gray-200 w-full" value="{{ old('salary') }}">
                    </div>

                    <div class="flex w-1/3 items-center form-check pt-6">
                        <input name="match"
                            class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" id="match">
                        <label class="form-check-label inline-block text-gray-800 pt-2" for="match">
                            À Combinar
                        </label>
                    </div>
                </div>

                <div class="mb-6 flex justify-between items-center">
                    <div class="flex w-1/3 items-center form-check">
                        <input name="transport"
                            class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" id="transport">
                        <label class="form-check-label inline-block text-gray-800 pt-2" for="transport">
                            Vale Transporte
                        </label>
                    </div>

                    <div class="flex w-1/3 items-center form-check">
                        <input name="food"
                            class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" id="food">
                        <label class="form-check-label inline-block text-gray-800 pt-2" for="food">
                            Vale Alimentação
                        </label>
                    </div>

                    <div class="flex w-1/3 items-center form-check">
                        <input name="snack"
                            class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" id="snack">
                        <label class="form-check-label inline-block text-gray-800 pt-2" for="snack">
                            Vale Refeição
                        </label>
                    </div>

                    <div class="flex w-1/3 items-center form-check">
                        <input name="health"
                            class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" id="health">
                        <label class="form-check-label inline-block text-gray-800 pt-2" for="health">
                            Convênio Médico
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="font-semibold mb-1 block">Descricao</label>
                    <textarea name="description" rows="6" class="rounded-md bg-gray-100 border border-gray-200 w-full" style="resize:none;"
                        placeholder="Digite uma breve descrição do que você aprenderá/aprendeu...">{{ old('description') }}</textarea>
                </div>

                {{-- Tags --}}
                <div class="mb-6">
                    <label for="tags" class="font-semibold mb-1">Tags - <small class="italic">Separado por ";" (ponto e virgula) sem espaço</small></label>
                    <input type="text" placeholder="Atendimento;Banco;Empresa" name="tags"
                        class="rounded-md bg-gray-100 border border-gray-200 w-full" value="{{ old('city') }}">
                </div>


                <div class="flex items-center justify-end">
                    <a href="{{ route('company.jobs') }}"
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
</x-admin-layout>
