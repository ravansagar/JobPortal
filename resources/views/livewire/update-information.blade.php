<div
    class="w-1/2 h-[80vh] mx-auto flex flex-col justify-center items-center pt-8 bg-gradient-to-r from-blue-100 via-purple-100 to-yellow-100 relative">
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 2000)" x-show="show"
            class="fixed top-15 right-4 z-50 bg-white text-green-600 border border-green-400 rounded px-4 py-2 shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="fixed top-15 right-4 z-50 bg-white text-red-500 border border-red-400 rounded px-4 py-2 shadow">
            {{ session('error') }}
        </div>
    @endif
    <div
        class="absolute rounded-lg inset-0 bg-white/10 backdrop-blur-md shadow-lg shadow-gray-500/50 p-6 flex flex-col items-center z-10">
        <h2
            class="text-2xl font-bold font-serif pb-4 bg-gradient-to-r from-green-500 via-cyan-500 to-blue-500 bg-clip-text text-transparent">
            Edit Profile Information</h2>
        <div class="w-full flex justify-between px-15">
            <div class="w-32 h-32 relative rounded-full border-4 border-white shadow mb-6">
                <img src="{{ $currentImage }}" alt="Profile Image" class="w-full h-full object-cover rounded-full">

                <input type="file" wire:model="image" wire:keydown.enter="updateData" wire:blur="updateData"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20" />
            </div>
            <div class="w-48 h-32 relative rounded-full border-4 border-white shadow mb-6">
                <img src="{{ $logo }}" alt="Company Logo" class="w-full h-full object-cover rounded-full">

                <input type="file" wire:model="logo" wire:keydown.enter="updateData" wire:blur="updateData"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20" />
            </div>
        </div>
        <hr class="w-full border-t border-2 border-gray-700 mb-4">
        <form wire:submit.prevent="updateData">
            <div class="w-full flex justify-between px-8">
                <div>
                    <h2 class="text-xl font-semibold pb-4 font-mono">Personal Information</h2>
                    <h2 class="font-semibold text-lg font-serif">Name</h2>
                    <x-form.input-field wire:model.defer="name"
                        class="!px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500 my-2 !text-xl" />
                    <h2 class="font-semibold text-lg font-serif">Email</h2>
                    <x-form.input-field wire:model.defer="email"
                        class="!w-90 !px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500  my-2 !text-xl" />
                </div>

                <div class="px-8">
                    <h2 class="text-xl font-semibold pb-4 font-mono">Company Information</h2>
                    <h2 class="font-semibold text-lg font-serif">Company Name</h2>
                    <x-form.input-field wire:model.defer="cname"
                        class="!px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500 my-2 !text-xl" />
                    <h2 class="font-semibold text-lg font-serif">Company Address</h2>
                    <x-form.input-field wire:model.defer="location"
                        class="!px-4 !py-2 !bg-transparent !border-none !outline-none font-bold !bg-none !text-black/70 appearance-none focus:ring-2 focus:ring-purple-300 !hover:bg-gray-500  my-2 !text-xl" />
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