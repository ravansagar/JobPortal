<div
    class="w-1/3 h-[40vh] !bg-none mx-auto flex flex-col justify-center items-center pt-8 bg-gradient-to-r from-blue-100 via-purple-100 to-yellow-100 relative">
    <form wire:submit.prevent="deleteAccount">
        @csrf
        @method('delete')
    <div
        class="absolute rounded-lg inset-0 bg-red-500 backdrop-blur-md shadow-lg shadow-gray-500/50 p-6 flex flex-col items-center z-10">
        <h2 class="text-2xl font-bold font-serif pb-4 text-white/70">Delete Account</h2>
        <h2 class="text-l font-semibold font-sans">Are you sure, you really want to delete your account?</h2>
        
        <div class="my-8">
            <x-form.input-field name="password" wire:model.defer="password" type="password" placeholder="Enter your password" class="!bg-white-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" />
                </svg>
            </x-form.input-field>
        </div>

        <div class="mx-auto flex justify-between ">
            <a href="{{ url()->previous() }}" class="font-semibold text-xl bg-green-500 
                text-white px-4 py-2 rounded-lg  border-2 border-transparent
                hover:bg-white hover:text-black hover:border-green-500
                transition-all duration-300 ease-in-out mr-8">Cancel</a>
            <button type="submit" class="font-semibold text-xl bg-red-900 
                text-white px-4 py-2 rounded-lg  border-2 border-transparent
                hover:bg-white hover:text-black hover:border-red-900
                transition-all duration-300 ease-in-out ">Delete</button>
        </div>
    </div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-50 z-0">
    </div>
</div>
