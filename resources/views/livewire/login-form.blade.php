<div class="min-h-screen bg-gradient-to-b flex items-center justify-center relative overflow-hidden">
    {{-- <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-100 z-0"> --}}
    <div class="z-10 bg-white/30 backdrop-blur-md text-white rounded-xl shadow-2xl p-8 w-[350px]">
        <form wire:submit.prevent="login">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Login</h2>

            @if (session()->has('error'))
                <div class="text-red-400 mb-4">{{ session('error') }}</div>
            @endif

            <x-form.input-field name="email" type="email" placeholder="Enter your email">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
            </x-form.input-field>

            <x-form.input-field name="password" type="password" placeholder="Enter your password">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" />
                </svg>
            </x-form.input-field>

            <div class="flex items-center justify-between mb-6 text-sm">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-gray-800 bg-purple-700 border-none">
                    <span class="ml-2 text-gray-800">Remember me</span>
                </label>
                <a class="text-purple-500 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full py-2 bg-green-400 text-white font-semibold rounded-md hover:bg-green-500 transition-all">
                Login
            </button>
        </form>

        <p class="text-sm text-center mt-4 text-gray-800">Don't have an account?
            <a href="{{ route('register') }}" class="underline text-gray-800 hover:text-purple-500">Register</a>
        </p>
    </div>
</div>