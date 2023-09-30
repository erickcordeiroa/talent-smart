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
                <h2 class="text-xl font-bold">Novo Cliente</h2>
            </div>
        </div>

        <form action="{{ route('company.store.clients') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col py-4 form">

                {{-- Company --}}
                <div class="mb-6">
                    <label for="company" class="block mb-1 font-semibold">Razão Social</label>
                    <input type="text" name="company" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="Razão Social" value="{{ old('company') }}">
                </div>

                {{-- Fantasy --}}
                <div class="mb-6">
                    <label for="fantasy" class="block mb-1 font-semibold">Nome Fantasia</label>
                    <input type="text" name="fantasy" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="Nome Fantasia" value="{{ old('fantasy') }}">
                </div>

                {{-- Email --}}
                <div class="mb-6">
                    <label for="email" class="block mb-1 font-semibold">E-mail</label>
                    <input type="email" name="email" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="E-mail" value="{{ old('email') }}">
                </div>

                {{-- Document --}}
                <div class="mb-6">
                    <label for="document" class="block mb-1 font-semibold">CPF/CNPJ</label>
                    <input type="text" name="document" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="CNPJ/CPF" value="{{ old('document') }}">
                </div>

                {{-- Image Cliente --}}
                <div class="mb-6">
                    <label for="cover" class="block mb-1 font-semibold">Logo Cliente</label>
                    <input type="file" id="cover" name="cover" class="w-full p-2 text-sm font-semibold"
                        accept="image/*" />
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
                        <span class="ml-2 capitalize text-md">Salvar Cliente</span>
                    </button>
                </div>
            </div>
        </form>

    </div><!-- end Educations Container -->
</x-admin-layout>
