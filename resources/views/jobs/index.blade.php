@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 w-[100vw]">
        <hr class="text-gray-300 text-l font-bold pb-4">
        <div class="w-[80vw] flex mx-auto justify-center">
        @if (session()->has('success'))
            <div class="text-green-400 my-2">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="text-red-400 my-2">{{ session('error') }}</div>
        @endif
        @auth
            @livewire('job-list')
            @livewire('delete-job')
        @endauth
    </div>
    </div>
@endsection