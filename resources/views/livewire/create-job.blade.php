<div>
    <div class="w-[100vw]">
        <div class="min-h-screen bg-gradient-to-b flex items-center justify-center relative overflow-hidden">

            @if (session()->has('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                    class="fixed top-15 right-4 z-50 bg-white text-green-600 border border-green-400 rounded px-4 py-2 my-4 shadow">
                    {{ session('error') }}
                </div>
            @endif
            <div class="z-10 bg-white/10 backdrop-blur-md text-gray-800 rounded-xl shadow-2xl p-8 w-[400px]">
                <form wire:submit.prevent="store">
                    <div class="flex mx-auto justify-between">
                        <a href="{{ route('myjobs.index') }}"
                            class="text-2xl border border-black/30 rounded-full mb-6 -mt-1 px-2 hover:outline-green hover:bg-green-500">&larr;</a>
                        <h2 class="text-2xl font-bold mb-6 text-center">Post a New Job</h2>
                        <h2 class="w-[1/4] mr-4"></h2>
                    </div>

                    <div class="mb-4 flex flex-col items-center justify-center">
                        {{-- <div wire:ignore class="relative h-[125px] w-[125px] mb-2" x-data="{ preview: null }">

                            <img x-bind:src="preview || ''" alt="Insert an image"
                                class="h-full w-full rounded-full object-cover ring-2 ring-black/50">

                            <input type="file" x-ref="fileInput"
                                @change=" preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null;"
                                class="absolute inset-0 opacity-0 cursor-pointer h-[125px] w-[125px]">

                            <div class="absolute bottom-1 right-1 bg-white p-1 rounded-full shadow z-10">
                                <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div> --}}
                        <div class="relative h-[125px] w-[125px] mb-2">
                            @if ($image == null)
                            <img src="" alt="Choose an Image"
                                class="h-full w-full rounded-full object-cover ring-2 ring-black/70">
                            @else
                            <img src="{{ $image->temporaryUrl() }}" alt="Image Preview"
                                class="h-full w-full rounded-full object-cover ring-2 ring-white/40">
                            @endif

                            <input type="file" wire:model.debounce.2000ms="image"
                                class="absolute inset-0 opacity-0 cursor-pointer h-[125px] w-[125px]" />

                            <div class="absolute bottom-1 right-1 bg-white p-1 rounded-full shadow z-10">
                                <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </div>
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

                    <x-form.input-field name="salary" placeholder="Salary" class="!pl-12">
                        <select wire:model="currency"
                            class="top-1.5 bg-transparent text-gray-900 text-sm font-semibold focus:outline-none">
                            <option value="npr">&#8360;</option>
                            <option value="usd">&dollar;</option>
                            <option value="inr">&#8377;</option>
                            <option value="eur">&euro;</option>
                        </select>
                    </x-form.input-field>

                    <div class="mb-4">
                        <textarea wire:model.defer="description" placeholder="Job Description"
                            class="w-full px-3 py-2 bg-black/20 border border-black/30 rounded text-gray-800 placeholder-white/70 focus:outline-none focus:ring focus:ring-purple-300 resize-none"
                            rows="4"></textarea>
                        @error('description') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tag_id" class="block text-gray-800 mb-1">Select a Tag</label>
                        <div class="flex space-x-2">
                            <select wire:model="tag_id"
                                class="w-[65%] px-3 py-2 bg-white/20 border border-black/30 rounded text-gray-800 placeholder-white/70 focus:outline-none z-50">
                                <option value="" class="text-blue-500">Select a Tag</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" class="text-blue-500">{{ $tag->name }}</option>
                                @endforeach
                            </select>

                            <button type="button" wire:click="showConfirmModal"
                                class="px-3 ml-2 py-2 bg-blue-500 text-gray-800 rounded hover:bg-blue-600">
                                &plus; Add Tag
                            </button>
                        </div>
                        @error('tag_id')
                            <span class="text-red-300 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-2 bg-black/30 text-purple-700 font-semibold rounded-md hover:bg-gray-100 transition-all">
                        Create Job
                    </button>
                </form>
            </div>
        </div>
        @livewire('add-tag')
    </div>
</div>