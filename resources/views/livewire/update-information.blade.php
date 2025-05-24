<div class="w-1/2 h-[80vh] mx-auto flex flex-col justify-center items-center pt-8 bg-white relative">
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 2000)" x-show="show"
            class="fixed top-15 right-4 z-50 bg-white text-green-600 border border-green-400 rounded px-4 py-2 shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('successc'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 2000)" x-show="show"
            class="fixed top-30 right-4 z-50 bg-white text-green-600 border border-green-400 rounded px-4 py-2 shadow">
            {{ session('successc') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="fixed top-15 right-4 z-50 bg-white text-red-500 border border-red-400 rounded px-4 py-2 shadow">
            {{ session('error') }}
        </div>
    @endif
    <div
        class="absolute rounded-lg inset-0 bg-white/10 backdrop-blur-md shadow-lg shadow-gray-500/50 p-6 flex flex-col items-center z-10">
        <div class="w-full flex mx-auto justify-between">
            <a href="{{ route('profile') }}"
                class="text-xl border border-black rounded-full mb-6 -mt-1 px-2 mx-4 hover:outline-green hover:bg-green-500">&larr;</a>
            <h2
                class="text-2xl font-bold font-serif pb-4 bg-gradient-to-r from-green-500 via-cyan-500 to-blue-500 bg-clip-text text-transparent">
                Edit Profile Information
            </h2>
            <h2 class="w-[1/4] mr-4"></h2>
        </div>


        <div class="w-full flex justify-between px-15">
            <div class="w-32 h-32 relative rounded-full border-4 border-white shadow mb-6">

                <img src="{{ $currentImage }}" alt="Profile Image" class="w-full h-full object-cover ring-2 ring-black/30 rounded-full">

                <input type="file" wire:model="image" wire:keydown.enter="updateData" wire:blur="updateData"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20" />

                <div class="absolute bottom-1 right-1 bg-white p-1 rounded-full shadow z-10">
                    <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                </div>
            </div>

            <div class="w-48 h-32 relative rounded-full border-4 border-white shadow mb-6">
                <img src="{{ $logo }}" alt="Company Logo" class="w-full h-full object-cover rounded-full">

                <input type="file" wire:model="logo" wire:keydown.enter="updateData" 
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20" />
                
                <div class="absolute bottom-1 right-1 bg-white p-1 rounded-full shadow z-10">
                    <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                </div>
                
            </div>
        </div>
        <hr class="w-full border-t border-2 border-gray-700 mb-4">
        <form wire:submit.prevent="updateData">
            <div class="w-full flex justify-between px-8">
                <div>
                    <h2 class="text-xl font-semibold pb-4 font-mono">Personal Information</h2>
                    <h2 class="font-semibold text-lg font-serif">Name</h2>
                    <x-form.input-field wire:model.defer="name"
                        class="!px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500 !text-xl" />
                        @error('name') 
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    <h2 class="font-semibold text-lg font-serif">Email</h2>
                    <x-form.input-field wire:model.defer="email"
                        class="!w-90 !px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500   !text-xl" />
                        @error('email') 
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                </div>

                <div class="px-8">
                    <h2 class="text-xl font-semibold pb-4 font-mono">Company Information</h2>
                    <h2 class="font-semibold text-lg font-serif">Company Name</h2>
                    <x-form.input-field wire:model.defer="cname"
                        class="!px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500 !text-xl" />
                        @error('cname') 
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    <h2 class="font-semibold text-lg font-serif">Company Address</h2>
                    <x-form.input-field wire:model.defer="location"
                        class="!px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500 !text-xl" />
                        @error('loaction') 
                            <span class="text-red-500 text-xs">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
            </div>

            <hr class="w-full border-t border-2 border-gray-700 mb-4">

            <div class="pt-4 mx-auto flex justify-between px-8  gap-8">
                <a href="{{ route("profile.changepass") }}" class="font-semibold text-xl bg-yellow-500 
                text-white px-4 py-2 rounded-lg mx-15 border-2 border-transparent
                hover:bg-white hover:text-black hover:border-yellow-500
                transition-all duration-300 ease-in-out">Change Password</a>

                <button type="submit" class="font-semibold text-xl bg-green-500 
                text-white px-4 py-2 rounded-lg mx-15 border-2 border-transparent
                hover:bg-white hover:text-black hover:border-green-500
                transition-all duration-300 ease-in-out">Update Profile</button>
            </div>
    </div>
    </form>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-50 z-0">
    </div>
</div>