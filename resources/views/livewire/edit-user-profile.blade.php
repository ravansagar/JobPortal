<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Edit Profile</h1>
                        <p class="mt-1 text-sm text-gray-500">Update your personal and professional information</p>
                    </div>
                    <a href="{{ route('user.profile') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="rounded-md bg-green-50 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="bg-white shadow rounded-lg mb-2">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-2">Profile Photo</h3>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @if ($profilePhoto )
                                <img class="h-24 w-24 rounded-full object-cover" src="{{ $profilePhoto->temporaryUrl() }}" alt="Profile preview">
                            @elseif($previousPhoto)
                                <img class="h-24 w-24 rounded-full object-cover" src="{{ asset(path: $previousPhoto) }}" alt="Profile preview">
                            @elseif ($user->profile_photo)
                                <img class="h-24 w-24 rounded-full object-cover" src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}">
                            @else
                                <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xl font-bold">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="ml-5">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex items-center">
                                    <label for="profile-photo" class="block text-sm font-medium text-gray-700 sr-only">
                                        Profile Photo
                                    </label>
                                    <input 
                                        id="profile-photo" 
                                        type="file" 
                                        wire:model="profilePhoto" 
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                    >
                                </div>
                                @error('profilePhoto') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
                                <p class="mt-1 text-xs text-gray-500">JPG, PNG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg mb-2">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Personal Information</h3>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <x-form.input-field name="name" placeholder="Enter your name..." />
                        </div>

                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <x-form.input-field name="email" type="email" placeholder="Enter your email..." />
                        </div>

                        <div class="sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                            <x-form.input-field name="phone" type="number" placeholder="Enter your phone number..." />
                        </div>

                        <div class="sm:col-span-3">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <x-form.input-field name="name" placeholder="Enter address..." />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 mb-2">
                <a href="{{ route('user.profile') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
