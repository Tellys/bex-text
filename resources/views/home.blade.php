@extends('layouts.app')
 
@section('content')
<section>
    <div class="w-full">
        <nav class="rounded-md w-full">
            <ol class="list-reset flex">
                <li class="text-gray-500">Home</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div>
        <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Página Inicial</h1>
        <p>>>> Escolha um dos módulos do sistema</p>

    <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/3 p-6 cursor-pointer" onclick="window.location='{{route('pedidos')}}'">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5 hover:to-green-500">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Pedidos</h2>
                           {{-- <p class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p> --}}
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6 cursor-pointer" onclick="window.location='{{route('administracao')}}'">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5 hover:to-yellow-500">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-yellow-600">
                                <i class="fas fa-cog fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Administração</h2>
                            {{-- <p class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></p> --}}
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6 cursor-pointer" onclick="window.location='{{route('indicador')}}'">
                <!--Metric Card-->
                <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5 hover:to-red-500">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-red-600">
                                <i class="fas fa-chart-line fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Indicadores</h2>
                            {{-- <p class="font-bold text-3xl">3 <span class="text-red-500"><i class="fas fa-caret-up"></i></span></p> --}}
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

        </div>
    </div>
</section>

@endsection
