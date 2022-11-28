<section>
    <div class="w-full">
        <nav class="rounded-md w-full">
            <ol class="list-reset flex">
                <li><a href="{{route('indicador')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li class="text-gray-500">Pedidos</li>
            </ol>
        </nav>
    </div>

    <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Pedidos</h1>
        
    <x-card title="Novo Pedido"> 
            <div class="w-full md:w-1/2 xl:w-1/3 p-6 cursor-pointer" wire:click="new" {{-- onclick="window.location='pedidos/comprar'" --}}>
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5 hover:to-green-500">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Novo Pedido</h2>
                        {{-- <p class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p> --}}
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
    </x-card>
                <hr class="m-5" />

    <x-card title="Lista de Pedidos">
        {{-- <x-input  class="border-info-800" wire:model.defer="search" label="Pesquisar pedido:" placeholder="Click na lupa para pesquisar">
            <x-slot name="append">
                <div  class="absolute inset-y-0 right-0 flex items-center p-0.5">

                    <x-button
                        class=" rounded-r-md h-full  "
                        wire:click="render"
                        icon="search"
                        primary
                        flat
                        squared
                    />
                </div>
            </x-slot>
        </x-input> --}}

        <div class="overflow-auto h-52 mt-4">
            <div class="text-center border shadow text-gray-800 text-2xl"><i class="fas fa-tasks fa-2x fa-inverse"></i> Pedidos Cadastrados</div>
            <table wire:loading.class="hidden"
                class="table-auto border-collapse w-full mt-4">
                <thead>
                <tr class="rounded-lg text-sm font-medium text-gray-700 text-left table-row"
                    style="font-size: 0.9674rem">
                    <th scope="col" class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Nº
                    </th>

                    <th scope="col" class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Status
                    </th>

                    <th scope="col" class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">V. Total
                    </th>

                    <th scope="col" class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">
                    Ação
                    </th> 
                </tr>

                </thead>
                <tbody class="text-sm font-normal text-gray-700 w-full">

                @foreach($pedidos as $key => $row)
                    @php
                    $bgLinha = 'border-gray-200';

                    switch($row->status){
                        case'cancelado':
                            $bgLinha = 'bg-red-100';
                            break;
                        case'aberto':
                            $bgLinha = 'bg-yellow-100';
                            break;
                        default:
                            $bgLinha = 'border-gray-200';
                            break;
                    }
                    @endphp

                    <tr class="hover:bg-gray-100 border-b {{$bgLinha}} py-2 ">

                        <td class="px-4 py-1">{{$row->id}}</td>
                        <td class="px-4 py-1">{{$row->status}}</td>
                        <td class="px-4 py-1">R$ {{number_format(($row->price),2,",",".")}}</td>
                        {{-- <td class="px-4 py-1 flex flex-row space-x-4 items-stretch">  --}}
                        <td class="px-4 py-1 inline-flex flex-end space-x-4">
                            <x-button onclick="window.location='pedidos/visualizar/{{$row->id}}'" icon="eye" primary title="Editar"/>
                            @php
                                if($row->status == 'aberto'){
                            @endphp
                            <x-button onclick="window.location='pedidos/comprar/{{$row->id}}'"  icon="pencil-alt" warning title="Editar" />
                            <x-button onclick="window.location='pedidos/comprar/{{$row->id}}'" icon="X" negative title="Cancelar/Deletar"/>
                            {{-- <x-button wire:click="cancelarPedido({{$pedido}})" icon="x" spinner="save" default title="Cancelar"/>
                            <x-button wire:click="deletarPedido({{$pedido}})"  icon="x" negative title="Deletar"/> --}}
                            @php
                                }
                            @endphp
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
        </div>

        <div class="mt-4">
            {{$pedidos->links() }}
        </div>
    </x-card>
</section>