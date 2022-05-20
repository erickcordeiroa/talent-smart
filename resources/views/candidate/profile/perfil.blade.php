<x-app-layout>
    <div class="profile bg-white border-transparent rounded-md">
        <div class="mr-4 p-4 flex items-center">
            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                class="w-20 mr-4 h-20 rounded-full">
            <a href="#" class="flex justify-between items-center p-2 font-semibold bg-lime-700 hover:bg-lime-900 text-sm text-white rounded-md transition duration-150 ease-in">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                <span class="ml-2 capitalize">Editar imagem de perfil</span>
            </a>
        </div>
        <hr>
        <div class="form flex flex-col px-8 py-4">
            {{-- Name --}}
            <label for="name" class="font-semibold my-2 ">Nome</label>
            <input type="text" name="name" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
            {{-- Email --}}
            <label for="email" class="font-semibold my-2 ">Email</label>
            <input type="text" name="email" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
            {{-- Address --}}
            <label for="address" class="font-semibold my-2 ">Endereco</label>
            <input type="text" name="address" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
            <div class="form-group flex">
                {{-- City --}}
                <div class="flex flex-col w-1/2 pr-2">
                    <label for="city" class="font-semibold my-2 ">Cidade</label>
                    <input type="text" name="city" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
                </div>
                {{-- State --}}
                <div class="flex flex-col w-1/2">
                    <label for="state" class="font-semibold my-2 ">Estado</label>
                    <input type="text" name="state" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
                </div>
            </div>
            {{-- Password --}}
            <div class="form-group flex">
                <div class="flex flex-col w-1/2 pr-2">
                    <label for="password" class="font-semibold my-2 ">Senha</label>
                    <input type="password" name="password" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
                </div>
                <div class="flex flex-col w-1/2">
                    <label for="conf-password" class="font-semibold my-2 ">Confirmar Senha</label>
                    <input type="password" name="conf-password" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
                </div>
            </div>
            {{-- Status --}}
            <label for="status" class="font-semibold my-2 ">Status</label>
            <select name="status" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md">
                <option value="1">Quero receber proposta de emprego</option>
                <option value="0">Nao quero receber proposta de emprego</option>
            </select>
            <label for="description" class="font-semibold my-2 ">Descricao</label>
            <textarea name="description" class="rounded-md bg-gray-200 border-2 border-tranparent hover:drop-shadow-md mb-4" style="resize:none;"></textarea>
            <a href="#" class="flex justify-between items-center p-2 w-1/3 font-semibold bg-lime-700 hover:bg-lime-900 text-sm text-white rounded-md transition duration-150 ease-in">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                <span class="ml-2 capitalize">Editar perfil</span>
            </a>
        </div>
    </div>
</x-app-layout>