<x-admin-layout>
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

    <div class="px-6 py-3 bg-white rounded-lg educations-container ">

        <div class="flex items-center justify-between w-full py-4 mb-4 border-b border-gray-200 header-vacancy-item">
            <div>
                <h2 class="text-xl font-bold">Nova Vaga</h2>
            </div>
        </div>

        <form action="{{ route('company.store.jobs') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col py-4 form">

                {{-- Clients --}}
                <div class="mb-6">
                    <label for="clients" class="block mb-1 font-semibold">Cliente</label>
                    <select required name="client_id" class="w-full bg-gray-100 border border-gray-200 rounded-md">
                        <option value="">Selecione um cliente</option>
                        @foreach ($clients as $item)
                            <option value="{{ $item->id }}">{{ $item->fantasy }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="block mb-1 font-semibold">Título</label>
                    <input type="text" name="title" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="Ex: Atendente de Supermercado" value="{{ old('title') }}">
                </div>

                {{-- Category --}}
                <div class="mb-6">
                    <label for="category" class="block mb-1 font-semibold">Categoria</label>
                    <select required name="category_id" class="w-full bg-gray-100 border border-gray-200 rounded-md">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col items-center mb-6 form-group md:flex-row">
                    {{-- City --}}
                    <div class="flex flex-col w-full mb-6 md:w-1/2 md:mr-2 md:mb-0">
                        <label for="city" class="mb-1 font-semibold">Cidade</label>
                        <input type="text" placeholder="Registro" name="city"
                            class="w-full bg-gray-100 border border-gray-200 rounded-md" value="{{ old('city') }}">
                    </div>

                    {{-- Salary --}}
                    <div class="flex flex-col w-full md:w-1/3 md:mr-2">
                        <label for="salary" class="mb-1 font-semibold">Salário</label>
                        <input type="text" name="salary" placeholder="R$ 3.000,00"
                            class="w-full bg-gray-100 border border-gray-200 rounded-md" value="{{ old('salary') }}">
                    </div>

                    <div class="flex items-center w-full pt-6 md:w-1/3 form-check">
                        <input name="match"
                            class="float-left w-6 h-6 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            type="checkbox" id="match">
                        <label class="inline-block pt-2 text-gray-800 form-check-label" for="match">
                            À Combinar
                        </label>
                    </div>
                </div>

                <span class="block w-full mb-2 font-bold">Benefícios</span>
                <div class="flex flex-col mb-6 md:flex-row md:justify-between md:items-center">
                    <div class="flex items-center w-full md:w-1/3 form-check">
                        <input name="transport"
                            class="float-left w-6 h-6 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            type="checkbox" id="transport">
                        <label class="inline-block pt-2 text-gray-800 form-check-label" for="transport">
                            Vale Transporte
                        </label>
                    </div>

                    <div class="flex items-center w-full md:w-1/3 form-check">
                        <input name="food"
                            class="float-left w-6 h-6 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            type="checkbox" id="food">
                        <label class="inline-block pt-2 text-gray-800 form-check-label" for="food">
                            Vale Alimentação
                        </label>
                    </div>

                    <div class="flex items-center w-full md:w-1/3 form-check">
                        <input name="snack"
                            class="float-left w-6 h-6 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            type="checkbox" id="snack">
                        <label class="inline-block pt-2 text-gray-800 form-check-label" for="snack">
                            Vale Refeição
                        </label>
                    </div>

                    <div class="flex items-center w-full md:w-1/3 form-check">
                        <input name="health"
                            class="float-left w-6 h-6 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                            type="checkbox" id="health">
                        <label class="inline-block pt-2 text-gray-800 form-check-label" for="health">
                            Convênio Médico
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-1 font-semibold">Descricao</label>
                    <textarea name="description" rows="6" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        style="resize:none;" placeholder="Digite uma breve descrição do que você aprenderá/aprendeu...">{{ old('description') }}</textarea>
                </div>

                {{-- Tags --}}
                <div class="mb-6">
                    <label for="tags" class="mb-1 font-semibold">Tags - <small class="italic">Separado por ";"
                            (ponto e virgula) sem espaço</small></label>
                    <input type="text" placeholder="Atendimento;Banco;Empresa" name="tags"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md" value="{{ old('city') }}">
                </div>


                <div class="flex items-center justify-end">
                    <a href="{{ route('company.jobs') }}"
                        class="flex items-center justify-center p-2 mr-2 text-sm font-semibold text-white transition duration-150 ease-in bg-red-700 rounded-md hover:bg-red-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <span class="ml-2 capitalize text-md">Cancelar</span>
                    </a>
                    <button type="submit"
                        class="flex items-center justify-center p-2 text-sm font-semibold text-white transition duration-150 ease-in rounded-md bg-lime-700 hover:bg-lime-900">
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
