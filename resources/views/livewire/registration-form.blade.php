<div class="min-h-screen bg-gradient-to-b  flex items-center justify-center relative overflow-hidden">
    
    <div class="z-10 bg-white/10 backdrop-blur-md text-white rounded-xl shadow-2xl p-8 w-[350px]">
        <form wire:submit.prevent='register'>
            @csrf
            <h2 class="text-2xl text-gray-800 font-bold mb-6 text-center">Register</h2>

            <input type="hidden" wire:model="role" value="user"/>
            <x-form.input-field name="name" placeholder="Full name">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                    <path d="M4 20c0-4 8-6 8-6s8 2 8 6" />
                </svg>
            </x-form.input-field>

            <x-form.input-field name="email" type="email" placeholder="Enter your email">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
            </x-form.input-field>

            <x-form.input-field name="password" type="password" placeholder="Password">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" />
                </svg>
            </x-form.input-field>

            <x-form.input-field name="password_confirmation" type="password" placeholder="Password">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" />
                    <polyline points="9 16 11 18 15 14" />
                </svg>
            </x-form.input-field>

            <button type="submit" wire:click.prevent="setRoleAndRegister('user')"
                class="w-full py-2 bg-black/30 text-purple-700 font-semibold rounded-md hover:bg-gray-100 transition-all">
                Register
            </button>
            <button type="submit" wire:click.prevent="setRoleAndRegister('agent')"
                class="w-full cursor-pointer text-blue-500 font-semibold flex justify-center my-2 py-2 rounded-md hover:bg-blue-500 hover:text-white/80">
            Register as Agent
            </button>
        </form>
        <p class="text-sm text-gray-800 text-center">Already have an account? <a href="{{ route('login') }}"
                class="underline  hover:text-purple-500">login</a></p>
    </div>
</div>