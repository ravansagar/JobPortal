<div>

    <div class="min-h-screen bg-gradient-to-b flex items-center justify-center relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-100 z-0">
        </div>
        <div
            class="absolute inset-0 bg-[url('https://plus.unsplash.com/premium_photo-1673240367277-e1d394465b56?q=80&w=2069&auto=format&fit=crop')] bg-no-repeat bg-bottom bg-cover z-0">
        </div>
        @if (session()->has('error'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                class="fixed top-15 right-4 z-50 bg-white text-red-600 border border-red-400 rounded px-4 py-2 my-4 shadow">
                {{ session('error') }}
            </div>
        @endif

        <div class="z-10 bg-white/10 backdrop-blur-md text-white rounded-xl shadow-2xl p-8 w-[400px]">
            <div class="flex mx-auto justify-between">
                <a href="{{ route('myjobs.index') }}"
                    class="text-2xl border border-white rounded-full mb-6 -mt-1 px-2 hover:outline-green hover:bg-green-500">&larr;</a>
                <h2 class="text-2xl font-bold mb-6 text-center">Update Job Information</h2>
                <h2 class="w-[1/4] mr-4"></h2>
            </div>
            <form wire:submit.prevent="updateData">
                <div class="mb-4 flex justify-center">
                    <div class="w-32 h-32 relative rounded-full border-4 border-white shadow mb-6">

                        <img src="{{ $image ? $image->temporaryUrl() : asset($job->image) }}" alt="Profile Image"
                            class="w-full h-full object-cover rounded-full">

                        <input type="file" wire:model="image"
                            class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20" />
                    </div>

                    @error('image')
                        <span class="text-red-300 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <x-form.input-field name="name" placeholder="Job Title">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M3 10h11M9 21V3m0 0H4a2 2 0 00-2 2v16a2 2 0 002 2h5m0-20h6a2 2 0 012 2v16a2 2 0 01-2 2H9" />
                    </svg>
                </x-form.input-field>

                <x-form.input-field name="salary" placeholder="Salary" class="!pl-12">
                    <select wire:model="currency" class="top-1.5 bg-transparent text-gray-900 text-sm font-semibold focus:outline-none">
                        <option value="npr">&#8360;</option>
                        <option value="usd">&dollar;</option>
                        <option value="inr">&#8377;</option>
                        <option value="eur">&euro;</option>
                    </select>
                </x-form.input-field>

                <div class="mb-4">
                    <textarea wire:model="description" placeholder="Job Description"
                        class="w-full px-3 py-2 bg-white/20 border border-white/30 rounded text-white placeholder-white/70 focus:outline-none focus:ring focus:ring-purple-300 resize-none"
                        rows="4">{{ $description }}</textarea>
                    @error('description') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div class="mb-4">
                    <label for="tag_id" class="block text-white mb-1">Select a Tag</label>
                    <div class="flex space-x-2">
                        <select wire:model="tag_id"
                            class="w-[65%] px-3 py-2 bg-white/20 border border-white/30 rounded text-white placeholder-white/70 focus:outline-none">
                            <option value="{{ $tag_id ? $tag_id : '' }}" class="text-blue-500">{{ App\Models\Tag::find($tag_id)->name }}</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" class="text-blue-500">{{ $tag->name }}</option>
                            @endforeach
                        </select>

                        <button type="button" wire:click="showConfirmModal"
                            class="px-3 ml-2 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            &plus; Add Tag
                        </button>
                    </div>
                    @error('tag_id')
                        <span class="text-red-300 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                @dump($tag_id)
                <button type="submit"
                    class="w-full py-2 px-2 flex justify-center bg-white text-purple-700 font-semibold rounded-md hover:bg-gray-100 transition-all">
                    Update Job
                </button>
            </form>
        </div>
    </div>
</div>