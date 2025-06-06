<div class="w-1/3 h-[55vh]  mx-auto flex justify-center items-center pt-8 bg-white relative">
    <form wire:submit.prevent="UpdatePassword">
        <div
            class="absolute rounded-lg inset-0 bg-white/10 backdrop-blur-md shadow-lg shadow-gray-500/50 p-6 flex flex-col items-center z-10">
            <div class="w-full flex mx-auto justify-between">
                <a href="{{ url()->previous() }}"
                    class="w-8 h-8 flex items-center justify-center text-xl font-bold ring-1 ring-black rounded-full mb-6 mx-2 -mr-2 hover:outline-green hover:bg-green-500 hover:text-white hover:ring-0">
                    &larr;
                </a>
                <h2
                    class="text-2xl font-bold font-serif pb-4 -ml-2 bg-gradient-to-r from-green-500 via-cyan-500 to-blue-500 bg-clip-text text-transparent">
                    Change Password</h2>
                <h2 class="w-[1/3] mr-8"></h2>
            </div>

            <hr class="w-full border-t border-2 border-gray-700 my-4">

            <div>
                <x-form.input-field name="current_password" wire:model.defer="current_password" type="password"
                    placeholder="Enter current password" class=" max-w-[100%]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0110 0v4" />
                    </svg>
                </x-form.input-field>

                <x-form.input-field name="password" wire:model.defer="password" type="password"
                    placeholder="Enter new password">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0110 0v4" />
                    </svg>
                </x-form.input-field>

                <x-form.input-field name="password_confirmation" wire:model.defer="password_confirmation"
                    type="password" placeholder="Retype new password">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0110 0v4" />
                        <polyline points="9 16 11 18 15 14" />
                    </svg>
                </x-form.input-field>
            </div>

            <hr class="w-full border-t border-2 border-gray-700 my-2">

            <div class="pt-4 mx-auto flex justify-between px-8  gap-8">
                <button type="submit" class="font-semibold text-xl bg-green-500 
                text-white px-4 py-2 rounded-lg mx-15 border-2 border-transparent
                hover:bg-white hover:text-black hover:border-green-500
                transition-all duration-300 ease-in-out">Chanage Password</button>
            </div>
        </div>
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-50 z-0">
        </div>
</div>