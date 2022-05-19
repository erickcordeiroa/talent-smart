<x-app-layout>
    <div class="job-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
        <div class="flex flex-1 px-2 py-6">
            <div class="w-full mx-4">
                {{-- Title Job --}}
                <h4 class="text-2xl font-semibold">
                    <a href="#" class="hover:underline">A random title can go here</a>
                </h4>

                <div class="flex items-center justify-between">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>Category 1</div>
                    </div>
                </div>

                {{-- Company Job --}}
                <div class="mt-4 flex items-center">
                    <div class="mr-4">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                            class="w-12 h-12 rounded-full">
                    </div>
                    <div>
                        <h6>EWD Marketing Digital e Desenvolvimento Web</h6>
                    </div>
                </div>

                {{-- Location and Salary --}}
                <div class="mt-4 flex items-center">
                    <div class="mr-12">
                        <span class="block font-bold text-md">Localização:</span>
                        <h6 class="text-sm text-orange-500">Registro-SP</h6>
                    </div>
                    <div>
                        <span class="block font-bold text-md">Salário:</span>
                        <h6 class="text-sm text-orange-500">Á Combinar</h6>
                    </div>
                </div>

                {{-- Benefits --}}
                <div class="mt-4">
                    <span class="block font-bold text-md mb-2">Benefícios:</span>

                    <div class="w-full flex flex-wrap justify-start items-center">

                        <div class="flex justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Benefício 01
                        </div>
                        <div class="flex justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Benefício 01
                        </div>
                        <div class="flex justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Benefício 01
                        </div>
                        <div class="flex justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Benefício 01
                        </div>
                        <div class="flex justify-between items-center my-2 mr-2">
                            <svg class="w-6 h-6 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Benefício 01
                        </div>

                        
                    </div>
                    
                </div>

                {{-- Description --}}
                <div class="description-job mt-4">
                    <span class="block font-bold text-md">Descrição:</span>
                    <p class="text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quo quisquam tempore modi iure
                        at possimus fugit placeat perferendis, ducimus aperiam eaque excepturi sapiente atque quos!
                        Nihil optio, natus architecto perspiciatis. Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Corporis iusto quis blanditiis labore nisi possimus consectetur porro,
                        architecto culpa provident voluptatibus rem nulla commodi nemo, inventore reprehenderit!
                        Dolor perspiciatis numquam, vitae dolorum quidem ullam voluptatem perferendis quia
                        exercitationem atque animi dolore! Maxime nobis natus maiores eius quae, iure nesciunt
                        aperiam.
                    </p>
                </div>

                {{-- Button Candidatar --}}
                <div class="flex items-center mt-4 justify-end">
                    <a href="#"
                        class="relative bg-green-600 text-white hover:bg-green-900 rounded-full transition duration-150 ease-in px-6 py-2">
                        Quero me candidatar a vaga
                    </a>
                </div>

            </div>
        </div>
    </div><!-- job-container -->
</x-app-layout>
