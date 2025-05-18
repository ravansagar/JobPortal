<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded-lg mb-2">
            <div class="px-4 py-5 sm:px-6 flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xl font-bold">
                        @if($profilePhoto)
                            <img src={{ asset($profilePhoto) }} class="h-16 w-16 rounded-full" loading="lazy"/>
                        @else
                        {{ substr($user->name, 0, 1) }}
                        @endif
                    </div>
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('user.edit') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-200 mb-5">
            <nav class="-mb-px flex space-x-8">
                <button 
                    wire:click="setTab('profile')" 
                    class="{{ $activeTab === 'profile' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                >
                    Profile Information
                </button>
                <button 
                    wire:click="setTab('applications')" 
                    class="{{ $activeTab === 'applications' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm"
                >
                    Job Applications
                    <span class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2.5 rounded-full text-xs">
                        {{ count($applications) }}
                    </span>
                </button>
            </nav>
        </div>

        <div>
            <div class="{{ $activeTab === 'profile' ? 'block' : 'hidden' }}">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Personal Information</h3>
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <dt class="text-xl font-medium text-gray-800">Full name</dt>
                                <dd class="mt-1 text-md text-gray-900">{{ $user->name }}</dd>
                            </div>
                            <div class="sm:col-span-3">
                                <dt class="text-xl font-medium text-gray-800">Email address</dt>
                                <dd class="mt-1 text-md text-gray-900">{{ $user->email }}</dd>
                            </div>
                            <div class="sm:col-span-3">
                                <dt class="text-xl font-medium text-gray-800">Phone number</dt>
                                <dd class="mt-1 text-md text-gray-900">{{ $user->phone ?? 'Not provided' }}</dd>
                            </div>
                            <div class="sm:col-span-3">
                                <dt class="text-xl font-medium text-gray-800">Location</dt>
                                <dd class="mt-1 text-md text-gray-900">{{ $user->location ?? 'Not provided' }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="{{ $activeTab === 'applications' ? 'block' : 'hidden' }}">
                @livewire('volt.appliedjobstable')
            </div>
        </div>
    </div>
</div>
