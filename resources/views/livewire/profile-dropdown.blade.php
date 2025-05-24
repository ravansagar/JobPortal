<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="focus:outline-none">
        @if(Auth::user()->image)
            <img src="{{ asset(Auth::user()->image) }}" alt="Profile"
                class="w-10 h-10 rounded-full border-2 border-white object-cover">
        @else
            <div
                class="h-10 w-10 rounded-full bg-gray-200 flex ring-2 ring-green-500 items-center justify-center text-gray-600 text-xl font-bold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        @endif
    </button>

    <div x-show="open" @click.away="open = false"
        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">

        @if(Auth::user()->role != 'admin')
            <a href="{{ Auth::user()->role == 'user' ? route('user.profile') : route('profile') }}"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                {{ ((Auth::user()->role == 'user' && Auth::user()->phone == '') || (Auth::user()->role == 'agent' && Auth::user()->company_id == '')) ? 'Update Profile' : 'My Profile'}}
            </a>
        @endif

        @livewire('logout')
    </div>
</div>