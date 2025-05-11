@extends('layouts.base')

@section('content')
<div class="min-h-screen w-[100vw] flex items-center justify-center  text-white p-4">
    <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-100 z-0">
        </div>
        <div
            class="absolute inset-0 bg-[url('https://plus.unsplash.com/premium_photo-1673240367277-e1d394465b56?q=80&w=2069&auto=format&fit=crop')] bg-no-repeat bg-bottom bg-cover z-0">
        </div>
    <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-bold mb-4">{{ $job->name }}</h2>

        @if ($job->image)
        <div class="relative w-64 h-64 mx-auto mb-4">
            <div class="absolute inset-0  rounded-lg  bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 animate-gradient-spin">
                <div class="w-full h-full bg-white rounded-lg"></div>
            </div>
            <img src="{{ asset($job->image) }}" alt="{{ $job->name }}"
                class="relative w-full h-full object-cover rounded-lg z-10" loading="lazy">
        </div>
        @endif

        <p class="text-white/90 mb-2"><strong>Description:</strong> {{ $job->description }}</p>
        <p class="text-white/80 mb-2"><strong>Salary:</strong> $ {{ number_format($job->salary) }}</p>
        <p class="text-white/70 mb-2"><strong>Tag:</strong> {{ $job->tag->name ?? 'N/A' }}</p>
        <p class="text-white/60 text-sm"><strong>Posted by:</strong> {{ $job->user->name ?? 'Unknown' }}</p>
        <div class="w-full flex justify-between px-8">
            <a href="{{ url()->previous() }}"
               class="inline-block mt-4 px-4 py-2 bg-white font-semibold text-gray-700 rounded hover:bg-green-500 hover:text-white transition duration-300 ease-in-out">
                &larr; Back
            </a>
            <a href="{{ url()->previous() }}"
                class="inline-block mt-4 px-4 py-2 bg-white font-semibold text-green-700 rounded hover:bg-green-500 hover:text-white transition duration-300 ease-in-out">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Apply
            </a>
        </div>
    </div>
</div>
@endsection
