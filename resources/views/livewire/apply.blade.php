<div>

    @if (session()->has('success'))
        <div x-data="{ show: true }"
                x-init="setTimeout(() => { show = false; window.location.href='{{ route('home') }}' }, 3000)"
                x-show="show" 
                class="p-4 bg-green-100 text-green-800 rounded text-right">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div x-data="{ show: true }"
                x-init="setTimeout(() => { show = false; 2000)"
                x-show="show"
                class="p-4 bg-red-100 text-red-800 rounded text-right">{{ session('error') }}</div>
    @endif

    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-2xl space-y-6 my-8 z-50">
        <div class="flex mx-auto justify-between">
            <div>
                <a href="{{route('home')}}" class="p-2 border border-black rounded-full">
                    &larr;
                </a>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Apply for: {{ $job->name }}</h2>
            <div class="w-1/7"></div>
        </div>


        <form wire:submit.prevent="apply" class="space-y-4">
            <div>
                <label class="block font-semibold">Full Name</label>
                <x-form.input-field name="name">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                        <path d="M4 20c0-4 8-6 8-6s8 2 8 6" />
                    </svg>
                </x-form.input-field>
            </div>

            <div>
                <label class="block font-semibold">Email</label>
                <x-form.input-field name="email" type="email">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                </x-form.input-field>
            </div>

            <div>
                <label class="block font-semibold">Resume (PDF/DOC, Max 2MB)</label>
                <x-form.input-field name="resume" type="file">
                    <svg class="w-5 h-5" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 0H2V16H14V7H7V0Z" fill="#fff" />
                        <path d="M9 0V5H14L9 0Z" fill="#fff" />
                    </svg>
                </x-form.input-field>
            </div>

            <div>
                <label class="block font-semibold">Cover Letter</label>
                <textarea name="coverLetter" rows="5"
                    class="w-full mt-1 p-2 rounded-md bg-black/20 focus:outline-none border-none focus:ring-2 focus:ring-purple-300"></textarea>
                @error('coverLetter') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl">
                    Apply Now
                </button>
            </div>
        </form>
    </div>
</div>