<div class="w-[100vw]">
    <div class="min-h-screen bg-gradient-to-b flex items-center justify-center relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-100 z-0">
        </div>
        <div
            class="absolute inset-0 bg-[url('https://plus.unsplash.com/premium_photo-1673240367277-e1d394465b56?q=80&w=2069&auto=format&fit=crop')] bg-no-repeat bg-bottom bg-cover z-0">
        </div>
        @if (session()->has('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                class="fixed top-15 right-4 z-50 bg-white text-green-600 border border-green-400 rounded px-4 py-2 my-4 shadow">
                {{ session('error') }}
            </div>
        @endif
        <div class="z-10 bg-white/10 backdrop-blur-md text-white rounded-xl shadow-2xl p-8 w-[400px]">
            <form wire:submit.prevent="store">
                <div class="flex mx-auto justify-between">
                    <a href="{{ route('myjobs.index') }}"
                        class="text-2xl border border-white rounded-full mb-6 -mt-1 px-2 hover:outline-green hover:bg-green-500">&larr;</a>
                    <h2 class="text-2xl font-bold mb-6 text-center">Post a New Job</h2>
                    <h2 class="w-[1/4] mr-4"></h2>
                </div>

                <div class="mb-4 flex flex-col items-center justify-center">
                    <div class="relative h-[125px] w-[125px] mb-2">
                        @if ($image == null)
                            <img src="" alt="Choose an Image"
                                class="h-full w-full rounded-full object-cover ring-2 ring-white/40">
                        @else
                            <img src="{{ $image->temporaryUrl() }}" alt="Image Preview"
                                class="h-full w-full rounded-full object-cover ring-2 ring-white/40">
                        @endif

                        <input type="file" wire:model="image"
                            class="absolute inset-0 opacity-0 cursor-pointer h-[125px] w-[125px]" />
                    </div>

                    @error('image')
                        <span class="text-red-300 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <x-form.input-field name="name" placeholder="Job Title">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M3 10h11M9 21V3m0 0H4a2 2 0 00-2 2v16a2 2 0 002 2h5m0-20h6a2 2 0 012 2v16a2 2 0 01-2 2H9" />
                    </svg>
                </x-form.input-field>

                <x-form.input-field name="salary" placeholder="Salary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v18M3 12h18" />
                    </svg>
                </x-form.input-field>

                <div class="mb-4">
                    <textarea wire:model.defer="description" placeholder="Job Description"
                        class="w-full px-3 py-2 bg-white/20 border border-white/30 rounded text-white placeholder-white/70 focus:outline-none focus:ring focus:ring-purple-300 resize-none"
                        rows="4"></textarea>
                    @error('description') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tag_id" class="block text-white mb-1">Select a Tag</label>
                    <div class="flex space-x-2">
                        <select wire:model="tag_id"
                            class="w-[65%] px-3 py-2 bg-white/20 border border-white/30 rounded text-white placeholder-white/70 focus:outline-none">
                            <option value="" class="text-blue-500">Select a Tag</option>
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
                
                <button type="submit"
                    class="w-full py-2 bg-white text-purple-700 font-semibold rounded-md hover:bg-gray-100 transition-all">
                    Create Job
                </button>
            </form>
        </div>
    </div>

</div>