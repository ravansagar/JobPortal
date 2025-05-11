<div class="bg-black rounded-lg shadow-md p-2 flex flex-col hover:scale-105 transition-transform duration-300 max-w-[50vh]">
        <div class="flex w-[15vw] h-[12vh]">
        <img src="{{ $job->image != '0' ? $job->image : 'https://plus.unsplash.com/premium_photo-1675793715030-0584c8ec4a13?w=600&auto=format&fit=crop&q=60' }}"
            alt="Job"
            class="h-full w-auto min-w-[40%] max-w-[50%] object-cover rounded-md opacity-0"
            loading="lazy"
            onload="this.classList.remove('opacity-0')" />

        <div class="pl-2 flex flex-col justify-center text-start w-full">
            <div class="font-bold text-sm text-white truncate">{{ $job->name }}</div>
            <div class="font-semibold text-[10px] text-gray-200 truncate bg-blue-500 border border-blue-500 rounded px-1 py-0.5">
                {{ $job->tag->name }}
            </div>
            <p class="text-gray-300 text-[12px] font-medium leading-tight">
                Salary:
                @switch($job->currency)
                    @case('npr') &#8360; @break
                    @case('usd') &dollar; @break
                    @case('inr') &#8377; @break
                    @case('eur') &euro; @break
                    @default {{ $job->currency }}
                @endswitch
                {{ $job->salary }}
            </p>
        </div>
    </div>
    <div class="flex flex-col text-[10px] space-y-0.5 pt-2 text-gray-200">
        <span class="font-medium">Company: {{ $job->user->company->name }}</span>
        <span class="font-medium line-clamp-1">Location: {{ $job->user->company->location }}</span>
    </div>

    <div class="flex ml-auto gap-2 mt-2">
        @if((Auth::id() == $job->user_id) && (request()->routeIs('myjobs.*')))
            <a href="{{ route('jobs.update', $job->id) }}"
                class="bg-green-500 text-white px-4 py-2 font-medium rounded-md text-center text-sm hover:bg-black hover:border-green-500">
                <i class="fa fa-edit" ></i> Edit
            </a>
            <button wire:click="showConfirmModal({{ $job->id }})"
                class="bg-red-500 text-white px-2 py-1 font-medium rounded-md text-center text-sm border-2 hover:bg-black hover:border-red-500">
                <i class="fa fa-trash" aria-hidden="true"></i> Delete
            </button>        
        @else
            <a href="{{ route('jobs.view', $job->id) }}"
                class="bg-blue-500 text-white px-3 py-1 rounded-md text-center text-[10px] hover:bg-black hover:border-blue-500">
                <i class="fa fa-eye text-green-500"></i> View
            </a>
            <a href="#"
                class="bg-blue-500 text-white px-3 py-1 rounded-md text-center text-[10px] hover:bg-black hover:border-blue-500">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Apply
            </a>
        @endif
    </div>
</div>
