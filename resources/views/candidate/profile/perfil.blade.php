<x-app-layout>
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

    @if (session('success'))
        <div class="w-full p-3 mb-4 text-white bg-green-400 border border-green-500 rounded-lg">
            <h5 class="mb-2 text-3xl font-bold text-white">Sucesso!</h5>
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-white border-transparent rounded-md profile">
        <form action="{{ route('app.update.perfil') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col px-8 py-4 form">
                {{-- Image Perfil --}}
                <div class="mb-6">
                    <label for="curriculo" class="block mb-1 font-semibold">Seu Currículo</label>
                    <input type="file" id="curriculo" name="curriculo" class="w-full p-2 text-sm font-semibold"
                       accept="application/pdf" />
                </div>


                {{-- Image Perfil --}}
                <div class="mb-6">
                    <label for="photo" class="block mb-1 font-semibold">Foto Perfil</label>
                    <input type="file" id="photo" name="photo" class="w-full p-2 text-sm font-semibold"
                        accept="image/*" />
                </div>

                {{-- Name --}}
                <div class="mb-6">
                    <label for="name" class="block mb-1 font-semibold">Nome Completo</label>
                    <input type="text" name="name" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="Ex: João de Souza" value="{{ $user->name }}">
                </div>

                {{-- Email --}}
                <div class="mb-6">
                    <label for="email" class="block mb-1 font-semibold">E-mail</label>
                    <input type="text" name="email" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="joaodasilva@hotmail.com" value="{{ $user->email }}">
                </div>


                {{-- Address --}}
                <div class="mb-6">
                    <label for="address" class="block mb-1 font-semibold">Endereco</label>
                    <input type="text" name="address" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                        placeholder="Rua José da Silva, 120 - Centro" value="{{ $user->address }}">
                </div>

                <div class="flex flex-col mb-6 form-group md:flex-row">
                    {{-- City --}}
                    <div class="flex flex-col w-full mb-6 md:w-1/2 md:pr-2 md:mb-0">
                        <label for="city" class="mb-1 font-semibold">Cidade</label>
                        <input type="text" name="city" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                            placeholder="Registro" value="{{ $user->city }}">
                    </div>
                    {{-- State --}}
                    <div class="flex flex-col w-full md:w-1/2 md:pr-2 md:mb-0">
                        <label for="state" class="mb-1 font-semibold">Estado</label>
                        <input type="text" name="state" class="w-full bg-gray-100 border border-gray-200 rounded-md"
                            placeholder="São Paulo" value="{{ $user->state }}">
                    </div>
                </div>


                {{-- Password --}}
                <div class="flex flex-col mb-6 form-group md:flex-row">
                    <div class="flex flex-col w-full mb-6 md:w-1/2 md:pr-2 md:mb-0">
                        <label for="password" class="mb-1 font-semibold">Senha</label>
                        <input type="password" name="password" class="bg-gray-100 border border-gray-200 rounded-md"
                            placeholder="********">
                    </div>
                    <div class="flex flex-col w-full md:w-1/2 md:pr-2 md:mb-0">
                        <label for="password_confirmation" class="mb-1 font-semibold">Confirmar Senha</label>
                        <input type="password" name="password_confirmation"
                            class="bg-gray-100 border border-gray-200 rounded-md" placeholder="********">
                    </div>
                </div>
                <div>
                    {{-- Date of Birthday --}}
                    <div class="flex flex-col mb-6 md:flex-row">
                        <div class="flex flex-col w-full mb-6 md:w-1/2 md:pr-2 md:mb-0">
                            <label for="dob" class="mb-1 font-semibold">Data de Aniversario</label>
                            <input type="date" name="birthday" class="bg-gray-100 border border-gray-200 rounded-md"
                                value="{{ $user->birthday }}">
                        </div>
                        {{-- CPF/CNPJ --}}
                        <div class="flex flex-col w-full md:w-1/2 md:pr-2 md:mb-0">
                            <label for="cpf" class="mb-1 font-semibold">CPF</label>
                            <input type="text" name="document" class="bg-gray-100 border border-gray-200 rounded-md"
                                placeholder="XXX.XXX.XXX-XX" value="{{ $user->document }}">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-6 md:flex-row">
                    {{-- License --}}
                    <div class="flex flex-col w-full mb-6 md:w-1/2 md:pr-2 md:mb-0">
                        <label for="license" class="block mb-1 font-semibold">Habilitação</label>
                        <select name="license" class="w-full bg-gray-100 border border-gray-200 rounded-md">
                            <option value="A" {{ $user->license == 'A' ? 'selected' : '' }}>A</option>
                            <option value="A/B" {{ $user->license == 'A/B' ? 'selected' : '' }}>A/B</option>
                            <option value="B" {{ $user->license == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $user->license == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $user->license == 'D' ? 'selected' : '' }}>D</option>
                            <option value="E" {{ $user->license == 'E' ? 'selected' : '' }}>E</option>
                            <option value="N" {{ $user->license == 'N' ? 'selected' : '' }}>Nenhuma</option>
                        </select>
                    </div>
                    {{-- Phone --}}
                    <div class="flex flex-col w-full md:w-1/2 md:pr-2 md:mb-0">
                        <label for="phone" class="mb-1 font-semibold">Celular</label>
                        <input type="text" name="phone" class="bg-gray-100 border border-gray-200 rounded-md"
                            placeholder="XX XXXXX-XXXX" value="{{ $user->phone }}" maxlength="11">
                    </div>
                </div>
                {{-- Status --}}
                <div class="mb-6">
                    <label for="status" class="block mb-1 font-semibold">Status</label>
                    <select name="status" class="w-full bg-gray-100 border border-gray-200 rounded-md">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Quero receber proposta de
                            emprego</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Nao quero receber proposta de
                            emprego</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-1 font-semibold">Descricao</label>
                    <textarea name="description" rows="10" class="w-full bg-gray-100 border border-gray-200 rounded-md" style="resize:none;"
                        placeholder="Digite uma breve descrição sua...">{{ $user->description }}</textarea>
                </div>


                <button type="submit"
                    class="flex items-center self-end justify-center w-40 p-2 text-sm font-semibold text-white transition duration-150 ease-in rounded-md bg-lime-700 hover:bg-lime-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span class="ml-2 text-lg capitalize">Editar perfil</span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
