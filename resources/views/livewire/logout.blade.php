<form wire:submit="logout">
    @csrf
    <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
        <div class="flex mx-auto justify-between text-red-500">
            <h2>Logout</h2>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 inline mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3H9m9 0l-3-3m3 3l-3 3" />
            </svg>
        </div>
    </button>
</form>
