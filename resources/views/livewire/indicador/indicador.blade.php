<section>
    <div class="w-full">
        <nav class="rounded-md w-full">
            <ol class="list-reset flex">
                <li><a href="{{route('indicador')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li class="text-gray-500">Indicadores</li>
            </ol>
        </nav>
    </div>

    <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Indicadores</h1>
    
    
<div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

<hr class="m-5" />

<h2>Mais caro X Mais Barato</h2>

                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><i class="fas fa-sort-amount-up fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Produto Mais Caro</h2>
                                   <p class="font-bold text-3xl">
                                   {{ $produtoMaisCaro ? json_decode($produtoMaisCaro)->name.' - R$ '.number_format((json_decode($produtoMaisCaro)->price),2,",",".") : 'Não existe produto'}}
                                    <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-sort-amount-down-alt fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Produto Mais Barato</h2>
                                    <p class="font-bold text-3xl">{{ $produtoMaisBarato ? json_decode($produtoMaisBarato)->name.' - R$ '.number_format((json_decode($produtoMaisBarato)->price),2,",",".") : 'Não existe produto'}}  <span class="text-yellow-600"><i class="fas fa-caret-down"></i></span></p>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                </div>

                <hr class="m-5" />
<h2>Sobre Produtos</h2>
                
                <div class="flex flex-wrap">

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Qtd de Produtos Cadastrados</h2>
                                   <p class="font-bold text-3xl">{{$totalProduto }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Quantidade Total de Produtos Vendidos</h2>
                                    <p class="font-bold text-3xl">{{$quantidadeTotalDeProdutosVendidos}}</p>                                                  
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Produto Mais Vendido</h2>
                                    <p class="font-bold text-3xl">{{json_decode($produtoMaisVendido)[0]->name}} <span class="text-red-500"><i class="fas fa-caret-up"></i></span></p>               
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                </div>

                <hr class="m-5" />
                <h2>Sobre Pedidos</h2>

                <div class="flex flex-wrap">

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-green-200 to-limepink-100 border-b-4 border-green-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total de Pedidos <small>(abertos e fechados)</small></h2>
                                    <p class="font-bold text-3xl">{{$totalProduto}} </p>                                   
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Pedidos Abertos</h2>
                                    <p class="font-bold text-3xl">{{ $pedidosAbertos }} </p>                                   
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Pedidos Fechados</h2>
                                    <p class="font-bold text-3xl">{{ $pedidosFechados }} </p>                                   
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Pedidos Cancelados</h2>
                                    <p class="font-bold text-3xl">{{ $pedidosCancelados }} </p>                                   
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Maior Pedido em R$</h2>
                                    <p class="font-bold text-3xl">Nº {{ $pedidoPrice ? json_decode($pedidoPrice)->id.' - R$ '.number_format((json_decode($pedidoPrice)->price),2,",",".") : 'Não existe o pedido'}}  <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></p>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Menor Pedido em R$</h2>
                                    <p class="font-bold text-3xl">Nº {{ $pedidoCusto ? json_decode($pedidoCusto)->id.' - R$ '.number_format((json_decode($pedidoCusto)->price),2,",",".") : 'Não existe o pedido'}} </p>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
</div>

                <hr class="m-5" />

                <div class="flex flex-wrap">                    
                    

            </div>
        </section>
