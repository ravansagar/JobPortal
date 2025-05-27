<div class="min-h-[91vh] w-[100vw] bg-white/40 p-6 -mb-4">
    <div class="bg-white shadow-lg rounded-2xl p-6 max-w-5xl mx-auto">

        <h2 class="text-2xl font-semibold mb-1">Welcome, {{  Auth::user()->name }} </h2>

        <p class="text-gray-500 mb-6">{{ now()->format('D, d F Y') }}</p>
        <div class="flex mx-auto justify-between">
            <div class="w-[3/4] flex items-center space-x-4 mb-2">
                @if($user->image == '')
                    <div
                        class="h-32 w-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-5xl font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @else
                    <img src="{{ $user->image }}" class="w-32 h-32 rounded-full border-4 border-white shadow"
                        alt="Profile Photo" />
                @endif
                <div>
                    <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
            @if(Auth::user()->role == 'agent')
                <div class="w-[1/4] grid grid-cols-1 px-8 py-4 text-l font-semibold text-white">
                    <a href="{{ route('profile.edit') }}"
                        class="border bg-green-500 my-4 px-2 py-2 rounded-full pt-2 text-center hover:bg-white hover:text-black transition duration-300 ease-in-out">Edit
                        Information</a>
                    <a href="{{ route('profile.delete') }}"
                        class="border bg-red-500 px-2 py-2 rounded-full pt-2 text-center hover:bg-white hover:text-black transition duration-300 ease-in-out">Delete
                        Account</a>
                </div>
            @endif
        </div>
        <div>
            <h2 class="font-sm text-2xl ">Basic Information</h2>
            <hr class="my-2 h-1 border bg-black " />
            <div class="flex justify-between w-full px-8 gap-8">
                <div class="w-[60%] py-2">
                    <div>
                        <h2 class="text-l font-semibold text-gray-900">Company Name</h2>
                        @if((Auth::user()->role == 'agent') && ($user->company_id == ''))
                            <div class="my-2 mb-4 relative">
                                <input type="text" wire:model.lazy="name" placeholder="Enter company name"
                                    wire:keydown.enter="createCompany" wire:blur="createCompany"
                                    class="w-1/2 px-4 py-2 rounded-md bg-white/20 placeholder-black text-black border border-black focus:border-none focus:outline-none focus:ring-2 focus:ring-purple-300">
                                @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        @else
                            <h2 class="px-2 py-2 text-l font-bold text-gray-500">{{ $user->company?->name ?? 'N/A' }}</h2>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-l font-semibold text-gray-900">Company Location</h2>
                        <h2 class="px-2 py-2 text-l font-bold text-gray-500">{{ $user->company?->location ?? 'N/A' }}
                        </h2>
                    </div>

                    <div>
                        <h2 class="text-l font-semibold text-gray-900">Jobs Created</h2>
                        <h2 class="px-2 py-2 text-l font-bold text-gray-500">{{ $numJobs }}</h2>
                    </div>
                </div>

                <div class="w-[40%] h-auto flex items-center justify-center">
                    <img src="{{ $user->company?->image }}"
                        class="h-[60%] w-[60%]  rounded-sm border-4 border-purple-500 shadow" alt="Company Logo" />
                </div>
            </div>

        </div>
    </div>