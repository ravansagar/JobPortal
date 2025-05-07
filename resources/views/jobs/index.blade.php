@extends('layouts.app')

@section('content')
    <hr class="text-gray-300 text-l font-bold pb-4">
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
@endsection