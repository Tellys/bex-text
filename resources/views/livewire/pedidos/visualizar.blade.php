<section>
    <div class="w-full">
        <nav class="rounded-md w-full">
            <ol class="list-reset flex">
                <li><a href="{{route('indicador')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li><a href="{{route('pedidos')}}" class="text-blue-600 hover:text-blue-700">Pedidos</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li class="text-gray-500">Visualizar</li>
            </ol>
        </nav>
    </div>

    <h1 class="text-center font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Pedido nº {{$pedido}}</h1>
    
    <div class="flex flex-wrap">

        {{-- <div class="w-full md:w-1/2 xl:w-1/2 p-6"> --}}
        <div class="w-full p-6">
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
                            <td class="px-4 py-1">R$ {{number_format($row->price/$row->quantidade,2,",",".")}}</td>
                            <td class="px-4 py-1">R$ {{number_format($row->price,2,",",".")}}</td>
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
                    <x-button label="Imprimir" onClick="javascript:window.print();"  icon="shopping-cart" spinner="save" info/>
                    <x-button label="Página Pedido" onclick="window.location='/pedidos'" icon="reply" spinner="save" primary />
                </div>


            </div>
        </div>
        <!--/-->
        
    </div>
</section>

