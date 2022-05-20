<x-app-layout>
    <div class="profile bg-white border-transparent rounded-md">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form flex flex-col px-8 py-4">

                {{-- Image Perfil --}}
                <div class="mb-6">
                    <label for="name" class="font-semibold block mb-1">Foto Perfil</label>
                    <input type="file" class="p-2 font-semibold text-sm w-full" accept="image/*"/>
                </div>

                {{-- Name --}}
                <div class="mb-6">
                    <label for="name" class="font-semibold block mb-1">Nome Completo</label>
                    <input type="text" name="name" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Ex: João de Souza">
                </div>

                {{-- Email --}}
                <div class="mb-6">
                    <label for="email" class="font-semibold block mb-1">E-mail</label>
                    <input type="text" name="email" class="w-full rounded-md bg-gray-100 border border-gray-200"
                        placeholder="joaodasilva@hotmail.com">
                </div>
                {{-- Address --}}
                <div class="mb-6">
                    <label for="address" class="font-semibold block mb-1">Endereco</label>
                    <input type="text" name="address" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                        placeholder="Rua José da Silva, 120 - Centro">
                </div>

                <div class="form-group flex mb-6">
                    {{-- City --}}
                    <div class="flex flex-col w-1/2 pr-2">
                        <label for="city" class="font-semibold mb-1">Cidade</label>
                        <input type="text" name="city" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                            placeholder="Registro">
                    </div>
                    {{-- State --}}
                    <div class="flex flex-col w-1/2">
                        <label for="state" class="font-semibold mb-1">Estado</label>
                        <input type="text" name="state" class="rounded-md bg-gray-100 border border-gray-200 w-full"
                            placeholder="São Paulo">
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
                        <label for="conf-password" class="font-semibold mb-1">Confirmar Senha</label>
                        <input type="password" name="conf-password"
                            class="rounded-md bg-gray-100 border border-gray-200" placeholder="********">
                    </div>
                </div>


                {{-- Status --}}
                <div class="mb-6">
                    <label for="status" class="font-semibold mb-1 block">Status</label>
                    <select name="status" class="rounded-md bg-gray-100 border border-gray-200 w-full">
                        <option value="1">Quero receber proposta de emprego</option>
                        <option value="0">Nao quero receber proposta de emprego</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="description" class="font-semibold mb-1 block">Descricao</label>
                    <textarea name="description" rows="10" class="rounded-md bg-gray-100 border border-gray-200 w-full" style="resize:none;"
                        placeholder="Digite uma breve descrição sua..."></textarea>
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
</x-app-layout>
