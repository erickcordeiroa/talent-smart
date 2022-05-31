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

    @if (session('success'))
        <div class="w-full mb-4 rounded-lg border border-green-500 bg-green-400 p-3 text-white">
            <h5 class="text-white font-bold text-3xl mb-2">Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::user()->fantasy == null)
        <div class="w-full mb-4 rounded-lg border border-blue-500 bg-blue-400 p-3 text-white">
            <h5 class="text-white font-bold text-3xl mb-2">Informação!</h5>
            <p>Preencha os campos abaixo para sua empresa estar aparecendo para os candidatos corretamente.</p>
        </div>
    @endif


    <div class="profile bg-white border-transparent rounded-md">
        <form action="{{ route('company.update.perfil') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form flex flex-col px-8 py-4">

                {{-- Image Perfil --}}
                <div class="mb-6">
                    <label for="photo" class="font-semibold block mb-1">Foto Perfil</label>
                    <input type="file" id="photo" name="photo" class="p-2 font-semibold text-sm w-full"
                        accept="image/*" />
                </div>

                {{-- Name --}}
                <div class="mb-6">
                    <label for="name" class="font-semibold block mb-1">Nome Completo</label>
                    <input type="text" name="name" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Ex: João de Souza" value="{{ $user->name }}">
                </div>

                {{-- Email --}}
                <div class="mb-6">
                    <label for="email" class="font-semibold block mb-1">E-mail</label>
                    <input type="text" name="email" class="w-full rounded-md bg-gray-100 border border-gray-200"
                        placeholder="joaodasilva@hotmail.com" value="{{ $user->email }}">
                </div>

                {{-- Fantasy --}}
                <div class="mb-6">
                    <label for="fantasy" class="font-semibold block mb-1">Nome Fantasia</label>
                    <input type="text" name="fantasy" class="w-full rounded-md bg-gray-100 border border-gray-200"
                        placeholder="Empresa das Americas Shoes" value="{{ $user->fantasy }}">
                </div>


                {{-- Address --}}
                <div class="mb-6">
                    <label for="address" class="font-semibold block mb-1">Endereco</label>
                    <input type="text" name="address" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Rua José da Silva, 120 - Centro" value="{{ $user->address }}">
                </div>

                <div class="form-group flex mb-6">
                    {{-- City --}}
                    <div class="flex flex-col w-1/3 pr-2">
                        <label for="city" class="font-semibold mb-1">Cidade</label>
                        <input type="text" name="city" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                            placeholder="Registro" value="{{ $user->city }}">
                    </div>
                    {{-- State --}}
                    <div class="flex flex-col w-1/3 pr-2">
                        <label for="state" class="font-semibold mb-1">Estado</label>
                        <input type="text" name="state" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                            placeholder="São Paulo" value="{{ $user->state }}">
                    </div>

                    {{-- CPF/CNPJ --}}
                    <div class="flex flex-col w-1/3">
                        <label for="cpf" class="font-semibold mb-1">CNPJ</label>
                        <input type="text" name="document" class="rounded-md bg-gray-100 border border-gray-200"
                            placeholder="XXX.XXX.XXX-XX" value="{{ $user->document }}">
                    </div>
                </div>


                {{-- Password --}}
                <div class="form-group flex mb-6">
                    <div class="flex flex-col w-1/2 pr-2">
                        <label for="password" class="font-semibold mb-1">Senha</label>
                        <input type="password" name="password" class="rounded-md bg-gray-100 border border-gray-200"
                            placeholder="********">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="password_confirmation" class="font-semibold mb-1">Confirmar Senha</label>
                        <input type="password" name="password_confirmation"
                            class="rounded-md bg-gray-100 border border-gray-200" placeholder="********">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="description" class="font-semibold mb-1 block">Descricao</label>
                    <textarea name="description" rows="10" class="rounded-md bg-gray-100 border border-gray-200 w-full" style="resize:none;"
                        placeholder="Digite uma breve descrição sua...">{{ $user->description }}</textarea>
                </div>


                <button type="submit"
                    class="self-end w-40 flex justify-center items-center p-2 font-semibold bg-lime-700 hover:bg-lime-900 text-sm text-white rounded-md transition duration-150 ease-in">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span class="ml-2 capitalize text-lg">Editar perfil</span>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
