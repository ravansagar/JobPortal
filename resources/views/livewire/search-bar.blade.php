<div x-data="{ open: false }" @click.away="open = false" class="relative w-1/4 flex justify-center">
    <button
        x-show="!open"
        @click="open = true"
        class="bg-blue-500 text-white p-2 rounded-md transition-all duration-300"
    >
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>

    <input
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        wire:model.live.debounce.300ms="search"
        wire:input="performSearch"
        type="text"
        placeholder="Search..."
        class="mr-[7rem] px-4 py-2 text-white bg-gray-800 rounded-md -mt-4 w-48 focus:outline-none absolute"
        @keydown.escape.window="open = false"
        autofocus
    >
</div>
