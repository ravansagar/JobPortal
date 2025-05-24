<x-layouts.app>
    <div class="text-right my-2 mx-4">
        <a href="{{route('jobs.create')}}"
            class="mx-4 text-green px-4 py-2 bg-green-500 text-white rounded-md  over:ring-2 hover:ring-green-500">&plus;
            Create  Job</a>
    </div>
    <div class="w-[80vw] flex mx-auto justify-center">
        @if (session()->has('success'))
            <div x-data="{ show: true }"
                x-init="setTimeout(() => { show = false; window.location.href='{{ route('myjobs.index') }}' }, 2000)"
                x-show="show"
                class="fixed top-4 right-4 z-50 bg-white text-green-600 border border-green-400 rounded mr-15 px-4 py-2 shadow">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="text-red-400 my-2">{{ session('error') }}</div>
        @endif
        @auth
            <div class="px-4">
                @livewire('job-list')
            </div>
            @livewire('delete-job')
        @endauth
    </div>
</x-layouts.app>