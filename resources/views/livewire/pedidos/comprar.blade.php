<section>
    <div class="w-full">
        <nav class="rounded-md w-full">
            <ol class="list-reset flex">
                <li><a href="{{route('indicador')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="{{route('pedidos')}}" class="text-blue-600 hover:text-blue-700">Pedidos</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li class="text-gray-500">Comprar</li>
            </ol>
        </nav>
    </div>

    <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Pedido nº {{$pedido}}</h1>
    
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!--Metric Card-->
            <div class="bg-white to-b from-white-200 to-silver-100 border-b-4 border-silver-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-gray-600"><i class="fas fa-file-export fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Incluir produto no Pedido</h2>
                        {{-- <p class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p> --}}
                    </div>
                </div>

                <hr class="m-5" />
                
                {{-- <x-input class="border-info-800" wire:model.defer="search" label="Pesquisar produto:" placeholder="Click na lupa para pesquisar">
                    <x-slot name="append">
                        <div class="absolute inset-y-0 right-0 flex items-center p-0.5">

                            <x-button
                                class=" rounded-r-md h-full  "
                                wire:click="render"
                                icon="search"
                                params="{{$pedido}}"
                                primary
                                flat
                                squared
                            />
                        </div>
                    </x-slot>
                </x-input> 

                <hr class="m-5" />--}}

                <table wire:loading.class="hidden" class="table-auto border-collapse w-full mt-4">
                    <thead>
                        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left table-row"
                            style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Nome
                            </th>

                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Quantidade
                            </th>
                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Preço (un)
                            </th>

                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Total
                            </th>

                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">
                            Ação
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-sm font-normal text-gray-700 w-full">
                        @foreach($produtos as $key => $row)
                        <form wire:submit.prevent="save({{$pedido}}, {{$row->id}}, {{$row->price}}, '{{$row->name}}', {{$row->lucro}})" id="form{{$row->id}}">
                            <tr class="hover:bg-gray-100 border-b border-gray-200 py-2 ">
                                <td class="px-4 py-1">{{$row->name}}</td>
                                <td class="px-4 py-1">
                                    <input id="produtoQuantidade{{$row->id}}" wire:model.defer="produto_quantidade.{{$row->id}}" onChange="setPriceXQuantidade({{$row->id}},{{$row->price+($row->price*($row->lucro/100))}})" class="border-info-800" type="number" min="1" required>
                                </td>
                                <td class="px-4 py-1">R$ {{number_format($row->price+($row->price*($row->lucro/100)),2,",",".")}}</td>
                                <td class="px-4 py-1" id="tdProdutoPriceTotal{{$row->id}}">R$ 0,00</td>                                    
                                <td class="px-4 py-1 flex-row">
                                    <x-button id="btn{{$row->id}}" icon="plus" spinner="save" primary type="submit"/>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!--/-->

        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <!-- -->
            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-gray-600"><i class="fas fa-file fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Produtos no Pedido</h2>
                        {{-- <p class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p> --}}
                    </div>
                </div>

                <hr class="m-5" />
                
                <table class="table-auto border-collapse w-full mt-4" id="tableCart">
                    <thead>
                        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left table-row"
                            style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Nome
                            </th>

                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">QTD
                            </th>
                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Preço (un)
                            </th>

                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Total
                            </th>

                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">
                            Ação
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-sm font-normal text-gray-700 w-full">
                        @php
                            $valorTotal = 0;
                        @endphp
                        @foreach($pedidosComprar as $key => $row)
                        <tr class="hover:bg-gray-100 border-b border-gray-200 py-2 ">
                            <td class="px-4 py-1">{{$row->produto_name}}</td>
                            <td class="px-4 py-1">{{$row->quantidade}}</td>
                            <td class="px-4 py-1">R$ {{number_format(($row->price/$row->quantidade),2,",",".")}}</td>
                            <td class="px-4 py-1">R$ {{number_format(($row->price),2,",",".")}}</td>
                            <td class="px-4 py-1 flex-row">
                                <x-button wire:click="delete({{$pedido}}, {{$row->id}})" icon="x" spinner="save" negative />
                            </td>
                        </tr>
                        @php
                            $valorTotal += $row->price;
                        @endphp
                        @endforeach
                    </tbody>
                </table>

                <hr class="m-5" />
                <p class="text-right p-3 font-bold">Valor total = R$ {{number_format($valorTotal,2,",",".")}}</p>

                <div class="inline-flex flex-end space-x-4">
                    <x-button label="Fechar Pedido" wire:click="fecharPedido({{$pedido}})" icon="shopping-cart" spinner="save" info/>
                    <x-button label="Cancelar Pedido" wire:click="cancelarPedido({{$pedido}})" icon="x" spinner="save" default />
                    <x-button label="Deletar Pedido" wire:click="deletarPedido({{$pedido}})" icon="x" spinner="save" negative />
                </div>


            </div>
        </div>
        <!--/-->
        
    </div>
</section>

@push('js-bottom')
    @once
    <script>
        function setPriceXQuantidade(id, price){
            produtoQuantidade = 'produtoQuantidade' + id;
            tdProdutoPriceTotal = 'tdProdutoPriceTotal' + id;

            qtd = document.getElementById('produtoQuantidade' + id).value;
            //price = document.getElementById('produtoPrice' + id).value;
            //pedido = document.getElementById('idPedido' + id).value;

            priceTotal = price * qtd;
            //console.log(id, produtoQuantidade, priceTotal);

            document.getElementById(tdProdutoPriceTotal).innerHTML = "";
            document.getElementById(tdProdutoPriceTotal).innerHTML = priceTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});;

            return;
        }
    </script>
    @endonce
@endpush