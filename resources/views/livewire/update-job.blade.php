@extends('layouts.base')

@section('content')
    <div>
        <div class="min-h-screen bg-gradient-to-b flex items-center justify-center relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-100 z-0">
            </div>
            <div
                class="absolute inset-0 bg-[url('https://plus.unsplash.com/premium_photo-1673240367277-e1d394465b56?q=80&w=2069&auto=format&fit=crop')] bg-no-repeat bg-bottom bg-cover z-0">
            </div>

            <div class="z-10 bg-white/10 backdrop-blur-md text-white rounded-xl shadow-2xl p-8 w-[400px]">
                <div class="flex mx-auto justify-between">
                    <a href="{{ url()->previous() }}"
                        class="text-2xl border border-white rounded-full mb-6 -mt-1 px-2 hover:outline-green hover:bg-green-500">&larr;</a>
                    <h2 class="text-2xl font-bold mb-6 text-center">Update Job Information</h2>
                    <h2 class="w-[1/4] mr-4"></h2>
                </div>

                @if (session()->has('success'))
                    <div class="text-green-400 mb-4">{{ session('success') }}</div>
                @endif

                <div class="mb-4 flex justify-center">
                    <div class="w-32 h-32 relative rounded-full border-4 border-white shadow mb-6">
                        <img src={{asset($image)}} alt="Profile Image" class="w-full h-full object-cover rounded-full">

                        <input type="file" wire:model="image" wire:keydown.enter="updateJob" wire:blur="updateJob"
                            accept="image/*" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20" />
                    </div>

                    @error('image')
                        <span class="text-red-300 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <x-form.input-field :name="$name" value="{{$name}}" placeholder="Job Title">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M3 10h11M9 21V3m0 0H4a2 2 0 00-2 2v16a2 2 0 002 2h5m0-20h6a2 2 0 012 2v16a2 2 0 01-2 2H9" />
                    </svg>
                </x-form.input-field>

                <x-form.input-field :name="$salary" value="{{$salary}}" placeholder="Salary" wire:keydown.enter="updateJob"
                    wire:blur="updateJob">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v18M3 12h18" />
                    </svg>
                </x-form.input-field>

                <div class="mb-4">
                    <textarea wire:model="description" placeholder="Job Description"
                        class="w-full px-3 py-2 bg-white/20 border border-white/30 rounded text-white placeholder-white/70 focus:outline-none focus:ring focus:ring-purple-300 resize-none"
                        rows="4" wire:keydown.enter="updateJob" wire:blur="updateJob">{{ $description }}</textarea>
                    @error('description') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <select wire:model="tag_id"
                        class="w-full px-3 py-2 bg-white/20 border border-white/30 rounded text-white placeholder-white/70 focus:outline-none">
                        <option value="{{ $tagId }}" class="text-blue-500" wire:keydown.enter="updateJob">{{ $tagName }}
                        </option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" class="text-blue-500">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tag_id') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                </div>

                <a href="{{ route('myjobs.index')}}"
                    class="w-full py-2 px-2 flex justify-center bg-white text-purple-700 font-semibold rounded-md hover:bg-gray-100 transition-all">
                    Update Job
                </a>
            </div>
        </div>

    </div>
@endsection