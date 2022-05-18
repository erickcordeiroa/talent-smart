<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border border-gray-200">
                <option value="Category One">Selecione uma categoria</option>
                <option value="Category One">Atendente</option>
                <option value="Category Two">Técnico de Informática</option>
                <option value="Category Three">Professor</option>
                <option value="Category Four">Administrador</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Procure a vaga que deseja"
                class="w-full placeholder-gray-900 rounded-xl bg-white border border-gray-200 px-4 py-2 pl-8" name=""
                id="">

            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->

    <div class="jobs-container space-y-6 my-6">
        <div
            class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="flex flex-1 px-2 py-6">
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center">
                        <div class="mr-4">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                                class="w-12 h-12 rounded-full">
                        </div>
                        <div>
                            <h6>EWD Marketing Digital e Desenvolvimento Web</h6>
                        </div>
                    </div>

                    <div class="text-gray-600 mt-4 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quo quisquam tempore modi iure
                        at possimus fugit placeat perferendis, ducimus aperiam eaque excepturi sapiente atque quos!
                        Nihil optio, natus architecto perspiciatis. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Corporis iusto quis blanditiis labore nisi possimus consectetur porro,
                        architecto culpa provident voluptatibus rem nulla commodi nemo, inventore reprehenderit!
                        Dolor perspiciatis numquam, vitae dolorum quidem ullam voluptatem perferendis quia
                        exercitationem atque animi dolore! Maxime nobis natus maiores eius quae, iure nesciunt
                        aperiam.
                    </div>

                    <div class="flex items-center space-x-2 mt-4 justify-between">
                        <div>
                            <span class="font-bold block">Salário</span>
                            <span class="text-md text-orange-500">À Combinar</span>
                        </div>
                        <a href="#"
                            class="relative bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
                            Ver informações da vaga
                        </a>
                    </div>

                </div>
            </div>
        </div><!-- job-container -->

        <div
            class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="flex flex-1 px-2 py-6">
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center">
                        <div class="mr-4">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                                class="w-12 h-12 rounded-full">
                        </div>
                        <div>
                            <h6>EWD Marketing Digital e Desenvolvimento Web</h6>
                        </div>
                    </div>

                    <div class="text-gray-600 mt-4 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quo quisquam tempore modi iure
                        at possimus fugit placeat perferendis, ducimus aperiam eaque excepturi sapiente atque quos!
                        Nihil optio, natus architecto perspiciatis. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Corporis iusto quis blanditiis labore nisi possimus consectetur porro,
                        architecto culpa provident voluptatibus rem nulla commodi nemo, inventore reprehenderit!
                        Dolor perspiciatis numquam, vitae dolorum quidem ullam voluptatem perferendis quia
                        exercitationem atque animi dolore! Maxime nobis natus maiores eius quae, iure nesciunt
                        aperiam.
                    </div>

                    <div class="flex items-center space-x-2 mt-4 justify-between">
                        <div>
                            <span class="font-bold block">Salário</span>
                            <span class="text-md text-orange-500">À Combinar</span>
                        </div>
                        <a href="#"
                            class="relative bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
                            Ver informações da vaga
                        </a>
                    </div>

                </div>
            </div>
        </div><!-- job-container -->

        <div
            class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="flex flex-1 px-2 py-6">
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center">
                        <div class="mr-4">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                                class="w-12 h-12 rounded-full">
                        </div>
                        <div>
                            <h6>EWD Marketing Digital e Desenvolvimento Web</h6>
                        </div>
                    </div>

                    <div class="text-gray-600 mt-4 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quo quisquam tempore modi iure
                        at possimus fugit placeat perferendis, ducimus aperiam eaque excepturi sapiente atque quos!
                        Nihil optio, natus architecto perspiciatis. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Corporis iusto quis blanditiis labore nisi possimus consectetur porro,
                        architecto culpa provident voluptatibus rem nulla commodi nemo, inventore reprehenderit!
                        Dolor perspiciatis numquam, vitae dolorum quidem ullam voluptatem perferendis quia
                        exercitationem atque animi dolore! Maxime nobis natus maiores eius quae, iure nesciunt
                        aperiam.
                    </div>

                    <div class="flex items-center space-x-2 mt-4 justify-between">
                        <div>
                            <span class="font-bold block">Salário</span>
                            <span class="text-md text-orange-500">À Combinar</span>
                        </div>
                        <a href="#"
                            class="relative bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
                            Ver informações da vaga
                        </a>
                    </div>

                </div>
            </div>
        </div><!-- job-container -->
    </div><!-- end jobs-container -->
</x-app-layout>
