<div class="min-h-screen bg-gradient-to-b  flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-100 z-0">
    </div>
    <div
        class="absolute inset-0 bg-[url('https://plus.unsplash.com/premium_photo-1673240367277-e1d394465b56?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-no-repeat bg-bottom bg-cover  z-0">
    </div>

    <div class="z-10 bg-white/10 backdrop-blur-md text-white rounded-xl shadow-2xl p-8 w-[350px]">
        <form wire:submit.prevent='register'>
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>


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

            <button type="submit"
                class="w-full py-2 bg-white text-purple-700 font-semibold rounded-md hover:bg-gray-100 transition-all">
                Register
            </button>
        </form>
        <p class="text-sm text-center mt-4">Already have an account? <a href="{{ route('login') }}"
                class="underline hover:text-purple-300">login</a></p>
    </div>
</div>