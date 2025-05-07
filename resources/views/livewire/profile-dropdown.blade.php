<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="focus:outline-none">
        <img src="{{ Auth::user()->image }}" alt="Profile"
            class="w-10 h-10 rounded-full border-2 border-white object-cover">
    </button>

    <div x-show="open" @click.away="open = false"
        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
            {{ Auth::user()->company_id == null ? 'Update Profile' : 'My Profile'}} 
            </a>
        <a href="{{ route('jobs.create') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Create Job</a>
        @livewire('logout')
    </div>
</div>