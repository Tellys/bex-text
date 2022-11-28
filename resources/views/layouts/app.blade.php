@extends('layouts.base')

@section('header')
    <x-nav />
@endsection

@section('body')
    <div class="flex flex-col justify-start  min-h-screen py-12 bg-gray-100 sm:px-6 lg:px-8">
        
        <div class="mt-4">

            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection

