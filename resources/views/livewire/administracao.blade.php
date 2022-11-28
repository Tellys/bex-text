@extends('layouts.app')
 
@section('content')
<section>
    <div class="w-full">
        <nav class="rounded-md w-full">
            <ol class="list-reset flex">
                <li><a href="{{route('indicador')}}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="text-gray-500 mx-2">/</span></li>
                <li class="text-gray-500">Administração</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div>
        <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Administração</h1>

        <div class="mt-4">
            <livewire:produtos.create/>
        </div>

        <div class="mt-4">
            <livewire:produtos.show/>
        </div>
        
    </div>
</section>

@endsection
 