@extends('layouts.app')

@section('content')
    <hr class="text-gray-300 text-l font-bold pb-4">
    @if (session()->has('success'))
        <div class="text-green-400 my-2">{{ session('success') }}</div>
    @endif
    @auth
        @livewire('job-list')
    @endauth
@endsection