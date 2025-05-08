<div
    class="aspect-[5/4] max-w-[20vw] min-h-[40vh] bg-black rounded-lg shadow-md p-4 flex flex-col hover:scale-105 transition-transform duration-300">

    <div class="flex items-start">
        <img src="{{$job->image != '0' ? $job->image :"https://plus.unsplash.com/premium_photo-1675793715030-0584c8ec4a13?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZnJvbnRlbmQlMjBkZXZlbG9wZXJ8ZW58MHx8MHx8fDA%3D"}}"
            alt="Job" class="h-32 w-32 object-cover rounded-md opacity-0" loading="lazy"
            onload="this.classList.remove('opacity-0')"/>

        <div class="pl-2 flex flex-col justify-center text-center h-full w-1/2 p-2">
            <div class="font-bold text-sm mb-1 text-white truncate">{{ $job->name }}</div>
            <div class="font-bold text-xs text-gray-200 mb-1 truncate bg-blue-500 border border-blue-500 rounded p-0.5">
                {{ $job->tag->name }}
            </div>
            <p class="text-gray-400 text-sm font-medium">Salary: {{ $job->salary }}</p>
        </div>

    </div>

    <p class="text-gray-100 mt-2 text-xs line-clamp-2 mb-1">{{ $job->description }}</p>

    <div class="flex flex-col text-[12px] space-y-0.5 text-gray-200">
        <span class=" font-medium">Company: {{ $job->user->company->name }}</span>
        <span class=" font-medium line-clamp-1">Location: {{ $job->user->company->location }}</span>
    </div>

    <div class="flex justify-between mt-auto pt-2 gap-4 px-4">

        @if((Auth::id() == $job->user_id) && (request()->routeIs('myjobs.*')))

            <a href="{{ route('jobs.update', $job->id) }}"
                class="bg-green-500 text-white px-3 py-1 font-medium rounded-md text-center text-sm w-1/2 pr-1 border-4 border-transparent box-border hover:bg-black hover:border-green-500">
                Edit
            </a>
            <button wire:click="showConfirmModal({{ $job->id }})"
                class="bg-red-500 text-white px-3 py-1 font-medium rounded-md text-center text-sm w-1/2 pl-1 border-4 border-transparent box-border hover:bg-black hover:border-red-500">
                Delete
            </button>        
            
        @else
            <a href="{{ route('jobs.view', $job->id) }}"
                class="bg-blue-500 text-white px-3 py-1 font-medium rounded-md text-center text-sm w-1/2 mr-1 border-4 border-transparent box-border hover:bg-black hover:border-blue-500">
                View
            </a>
            <a href="#"
                class="bg-blue-500 text-white px-3 py-1 font-medium rounded-md text-center text-sm w-1/2 pl-1 border-4 border-transparent box-border hover:bg-black hover:border-blue-500">
                Apply
            </a>
        @endif
    </div>
</div>