<x-app-layout>
    <div class="bg-white overflow-y-scroll shadow-xl sm:rounded-lg text-left p-4" style="max-height: 90vh">
        <h1 class="text-2xl">Defina seu perfil</h1>
        <h2 class="text-red-500 text-1xl font-bold">
            INSTRUÇÕES PARA A REALIZAÇÃO DO QUESTIONÁRIO
        </h2>
        <!-- Instruções Numero 1-->
        <div class="mt-5">
            <p class="my-2 bg-yellow-300 p-2">
                1. Analise as opções e enumere as mesmas de 1 a 4. A opção com a
                qual você <strong>MAIS</strong> se identifica, insira o
                <strong>NÚMERO 4</strong> na respectiva caixinha, e aquela com a
                qual você <strong>MENOS</strong> tem afinidade, assinale com um
                <strong>NÚMERO 1.</strong>
            </p>

            <p class="my-2 mb-4 bg-yellow-300 p-2">
                <strong>NÃO PENSE MUITO PARA RESPONDER</strong>, o primeiro
                pensamento que vem à mente é o
                <strong>mais instintivo, livre de filtros ou direcionamentos.</strong>
            </p>

            <p class="my-2">
                Por exemplo, na pergunta 26, se a frase/pergunta for:
            </p>
            <p class="italic">Características que mais te descrevem:</p>
            <p class="my-1 ml-5">A. Toma ação, Persuasivo, Convincente.</p>
            <p class="my-1 ml-5">B. Carismático, Magnético, Desinibido.</p>
            <p class="my-1 ml-5">C. Humilde, Compassivo com as pessoas</p>
            <p class="my-1 ml-5">D. Sistemático, Cético, Precavido</p>

            <p class="mb-1 mt-5 ml-5">
                Uma resposta incorreta seria empatar opções:
            </p>
            <p class="my-1 ml-5">
                <span class="display-inline-block mr-2">A: 4</span>
                <span class="display-inline-block mr-2">B: 3</span>
                <span class="display-inline-block mr-2">C: 3</span>
                <span class="display-inline-block mr-2">D: 4</span>
            </p>
            <p class="my-1 ml-5">Vejamos um exemplo correto:</p>
            <p class="my-1 ml-5">
                <span class="display-inline-block mr-2">A: 4</span>
                <span class="display-inline-block mr-2">B: 3</span>
                <span class="display-inline-block mr-2">C: 1</span>
                <span class="display-inline-block mr-2">D: 2</span>
            </p>

            <p class="my-2 ml-5 font-bold">
                É muito importante que enumere cada uma das opções com 1,2,3 e 4
            </p>
        </div>

        <!-- Instruções Numero 2-->
        <div class="mt-5">
            <p class="my-2">
                2. Uma vez terminado o questionário, você saberá que estilo de
                comportamento é o seu estilo principal. Lembre-se que não podem
                ocorrer empates.
                <strong>Um mesmo número não pode ser usado duas vezes na mesma
                    questão.</strong>
            </p>

            <p class="my-2 mb-4">
                Se obtiver valores iguais para qualquer uma das letras, você
                deverá refazer o questionário, assinalando um valor diferente a
                cada uma das opções nas respostas.
            </p>
        </div>

        <!--QUESTIONARIO-->
        <form class="j_define_profile" enctype="multipart/form-data" method="post" action="{{ route('app.define') }}">
            @csrf
            <div class="questions mt-5">
                <!-- QUESTIONS ITEMS 1-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        1. Em um restaurante. Estou esperando uma mesa e o garçom me
                        diz que em 10 minutos terei uma mesa, porém passam 20 minutos:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[1][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            A. Me aborreço e digo ao garçom que já se passou o dobro do
                            tempo, e lhe informo que se demorar muito irei embora e eles
                            perderão um cliente
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[1][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            B. Não me dou conta pois estou envolvido em uma conversa.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[1][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            C. Não me fixo ao tempo, ainda que eu saiba do atraso, não
                            falo nada.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[1][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            D. Informo ao Garçom exatamente a hora que cheguei e
                            exatamente o tempo que passou e peço que por favor me diga
                            com exatidão quanto tempo ainda falta para que eu possa
                            tomar uma decisão.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 2-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        2. Tenho muita fome e pressa. O garçom me traz um prato que eu
                        não pedi:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[2][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            A. Digo de maneira direta que este não foi o prato que pedi.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[2][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            B. Chamo o garçom e converso com ele explicando que este não
                            era o prato que eu havia pedido.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[2][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>C. Fico calado e aceito o prato que me trouxeram.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[2][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            D. Me incomodo e pergunto ao garçom de uma forma aborrecida
                            se ele estava prestando atenção quando fiz meu pedido?
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 3-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">3. Em uma reunião de amigos:</h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[3][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            A. Eu gosto de convencer aos demais de minhas opiniões e
                            gosto de falar sobre temas relacionados com meu trabalho.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[3][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            B. Escuto as pessoas. As pessoas me procuram pois sou um
                            excelente ouvinte. Escuto as pessoas com atenção.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[3][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            C. Falo muito e conto bastante piadas. Geralmente falo mais
                            do que escuto.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[3][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            D. Observo e analiso as pessoas, porém dou minha opinião.
                            Todavia só dou minha opinião quando conheço o tema e quando
                            o faço sou preciso.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 4-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        4. Meus companheiros de trabalho me descrevem como alguém:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[4][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Tranquilo, Paciente, Amável.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[4][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>B. Social, Alegre, Gosta de Conversar.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[4][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>C. Enérgico, Forte, Agressivo.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[4][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>D. Concreto, Disciplinado, Metódico.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 5-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">5. Em uma discussão:</h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[5][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            A. Trato de dizer que não é para tanto, pois discutir me
                            aborrece.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[5][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            B. Busco ter a razão e não paro até que consiga. Gosto de
                            discutir.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[5][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            C. Odeio agressões, concordo com o que esta sendo dito para
                            não precisar argumentar.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[5][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            D. Me baseio nos fatos e busco comprovar meu ponto de vista
                            de uma forma fundamentada e também espero que os demais
                            hajam assim.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 6-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        6. O que realmente me emociona na vida:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[6][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>A. Os desafios, As novidades, Arriscar.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[6][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>B. As surpresas, A diversão, O jogo.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[6][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>C. A doçura, O carinho, Aceitação</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[6][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>D. Aprender, Sabedoria, Conhecimento</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 7-->
                <div class="questions-item pt-5 border-t-2 border-gray-200">
                    <h4 class="font-bold italic">7. Se alguém me agride:</h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[7][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>A. Fico calado e não demonstro o que sinto.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[7][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            B. Escapo da situação ou pergunto a outra pessoa se ela é
                            louca.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[7][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            C. Devolvo a agressão pois necessito demonstrar minha
                            insatisfação de imediato. Da mesma forma que me incomodo
                            rapidamente me tranquilizo.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[7][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" required min="1" max="4" />
                        </div>
                        <div>
                            D. Me angustio, me privo e me resguardo, porém tento
                            descobrir por que isso aconteceu. Demora algum tempo para
                            que passe minha insatisfação com o acontecido.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 8-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">8. Quando vou as compras</h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[8][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Busco ofertas, os descontos me fascinam.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[8][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            B. Me divirto indo as compras. Gosto de comprar presentes,
                            dizem que sou um comprador compulsivo.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[8][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" required min="1"
                                max="4" />
                        </div>
                        <div>
                            C. Sei o que quero e não gasto meu dinheiro se não encontro.
                            Sou muito definido.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[8][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            D. Sou indeciso, me dá muito trabalho decidir e escolher.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 9-->
                <div class="questions-item pt-5 border-t-2 rounded-md border-gray-100">
                    <h4 class="font-bold italic">
                        9. Que frase te descreve melhor:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[9][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            A. Sou tranquilo e passivo, gosto das pessoas que são fáceis
                            de conviver e que não me agridam. As pessoas me perguntam se
                            nunca me aborreço.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[9][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            B. Sou alegre e jovial. Se vejo alguém triste procuro levar
                            alegria a está pessoa. As pessoas me perguntam se nunca me
                            deprimo.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[9][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            C. Sou ativo e enérgico, gosto de fazer várias coisas ao
                            mesmo tempo, as pessoas perguntam se não me canso.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[9][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            D. Sou analítico e observador, gosto de resolver problemas
                            que me exijam pensar e de encontrar soluções. As pessoas me
                            dizem que sou muito responsável e apreensivo.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 10-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        10. Quando estou trabalhando em equipe sou:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[10][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            A. O que organiza a parte estratégica com finalidade de
                            conseguir uma maior probabilidade de êxito.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[10][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            B. O que anima o ambiente fazendo com que todos tenham
                            vontade.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[10][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. O que manda e organiza.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[10][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            D. O que apóia com propósito de se ter uma equipe unida.
                        </div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 11-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        11. Meus irmãos e as pessoas que me rodeiam , dizem que meus
                        piores defeitos são:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[11][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Ser teimoso e quadrado</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[11][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Ser agressivo e temperamental.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[11][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Ser submisso e lento.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[11][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Ser distraído e desorganizado.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 12-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        12. Alguma de minhas qualidades são:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[12][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Ser Determinado e seguro.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[12][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Ser Adaptado e pacífico.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[12][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Ser Otimista e alegre.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[12][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Ser Cumpridor e estável</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 13-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        13. Estou caminhando e esbarro com algum desconhecido:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[13][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            A. Dou um passo ao lado e sem falar sigo meu caminho.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[13][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Dou um sorriso e sigo em frente.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[13][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            C. Espero que a pessoa saia do meu caminho para poder seguir
                            adiante.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[13][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Peço que me desculpe e sigo em frente.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 14-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        14. No trabalho me sobressaio em:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[14][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Na tomada de decisões rapidamente.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[14][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Nas relações públicas</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[14][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Na capacidade de me adaptar a equipes</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[14][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Na segurança de ter qualidade e pontualidade.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 15-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        15. Meus defeitos no trabalho são:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[15][a]"
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Não gosto de delegar, prefiro trabalhar sozinho.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[15][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Não gosto que me digam o que fazer.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[15][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Trabalho mais sobre baixa pressão.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[15][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Desordenado e esquecido e as vezes impontual.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 16-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        16. Minha mãe diz que quando criança eu era:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[16][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Obediente e tranquilo.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[16][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Mandão e exigente.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[16][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Alegre e conversava com todo mundo.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[16][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Bem arrumado e eu não gostava de me sujar.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 17-->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">17. Ao me expressar:</h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[17][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Falo as coisas de maneira diplomática.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[17][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Quase não expresso o que sinto.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[17][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Falo de maneira indireta para não magoar.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[17][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Falo as coisas como são.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 18 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        18. A emoção que demonstro com mais frequência é:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[18][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Medo.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[18][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Otimismo</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[18][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Não demonstro emoção.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[18][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Irritação.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 19 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        19. Os professores me reconheciam por que:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[19][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>
                            A. Discutia muito e gostava de demonstrar tudo que eu sabia.
                        </div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[19][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Bom estudante e bastante analítico.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[19][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Não interrompia e ficava calado.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[19][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Era muito amigável e gostava de conversar.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 20 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        20. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[20][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Auto-suficiente e ambicioso.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[20][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Preciso e exato.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[20][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Cooperativo e adaptável.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[20][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Despreocupado e popular.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 21 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        21. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[21][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Reservado e educado.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[21][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Amigo e conversador.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[21][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Tolerante e flexível.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[21][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Valente e ousado.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 22 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        22. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[22][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Obstinado, determinação para me defender.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[22][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Confiante, acredito nas pessoas.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[22][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Prudente, gosto de refletir bem sobre as coisas.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[22][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Pronto a servir, gosto de ajudar aos demais.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 23 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        23. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[23][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Brincalhão, chama a atenção das pessoas.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[23][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Empreendedor, força de vontade.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[23][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Generoso, se adapta aos demais.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[23][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Cuidadoso, cautela ao tomar decisões.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 24 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        24. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[24][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Calmo, faz o que te pedem.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[24][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Envolvente, motiva aos demais.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[24][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Atrevido, crê em si próprio.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[24][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Disciplinado, organizado e limpo.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 25 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        25. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[25][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Culto, busca ter conhecimento.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[25][b]" required
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Animado, alma da festa.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[25][c]" required
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Harmonioso, aberto a sugestões.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[25][d]" required
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Confrontante, gosta de argumentar.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->

                <!-- QUESTIONS ITEMS 26 -->
                <div class="questions-item pt-5 border-t-2 border-gray-100">
                    <h4 class="font-bold italic">
                        26. Características que mais te descrevem:
                    </h4>

                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" name="question[26][a]" required
                                class="questions-a w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>A. Humilde, compassivo (condolente) com as pessoas.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[26][b]"
                                class="questions-b w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>B. Carismático, atrai as pessoas, desinibido.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[26][c]"
                                class="questions-c w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>C. Tem atitude, persuasivo, convincente.</div>
                    </div>
                    <div class="my-2 flex items-center">
                        <div>
                            <input type="number" required name="question[26][d]"
                                class="questions-d w-18 h-8 rounded-md border-gray-300 mr-6" min="1" max="4" />
                        </div>
                        <div>D. Sistemático, cético, precavido.</div>
                    </div>
                </div>
                <!--/QUESTIONS ITEMS-->
            </div>

            <button type="submit"
                class="text-center text-1xl font-bold p-4 bg-blue-600
                    rounded-md text-white mx-auto block mt-8 w-full hover:bg-blue-800
                  ">
                Definir Perfil
            </button>
        </form>
        <!--FIM QUESTIONARIO-->
    </div>
</x-app-layout>
