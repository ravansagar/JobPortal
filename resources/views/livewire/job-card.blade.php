<div class="bg-gray-100/60 backdrop-blur-sm border -mb-1 border-gray-300/40 rounded-lg shadow-lg shadow-gray-400/50 pt-2 px-4 flex flex-col hover:scale-105 transition-transform duration-300 max-w-[50vh]">
   <a @if(str_contains($currentUrl, 'myjobs')) href="{{ route('applications', $job->id) }}" @endif>
    <div class="flex max-w-[10vw] h-[15vh]">
        <img src="{{ $job->image != '0' ? $job->image : 'https://plus.unsplash.com/premium_photo-1675793715030-0584c8ec4a13?w=600&auto=format&fit=crop&q=60' }}"
            alt="Job"
            class="h-full w-auto object-cover rounded-md opacity-0"
            loading="lazy"
            onload="this.classList.remove('opacity-0')" />

        <div class="px-4 flex flex-col justify-center text-start">
            <p class="font-bold text-sm text-gray-900 text-wrap">{{ $job->name }}</p>
            <p class=" font-semibold text-[12px] text-gray-800 truncate  px-1 py-0.5">
                {{ $job->tag->name }}
            </p>
            <p class="w-25 text-gray-900 text-[12px] font-medium leading-tight">
                Salary:
                @switch($job->currency)
                    @case('npr') &#8377; @break
                    @case('usd') &dollar; @break
                    @case('inr') &#8377; @break
                    @case('euro') &euro; @break
                    @default {{ $job->currency }}
                @endswitch
                {{ $job->salary }}
            </p>
        </div>
    </div>
    <div class="w-full flex mx-auto justify-between pb-4">
        <div class="flex flex-col text-[10px] space-y-0.5 pt-2 text-black">
            <span class="font-medium" title="{{ $job?->user?->company?->name }}"><span class="opacity-70">Company:</span> {{ $job->user?->company?->name }}</span>
            <span class="font-medium line-clamp-1" title="{{ $job?->user?->company?->location }}"><span class="opacity-70">Location: </span>{{ $job->user?->company?->location }}</span>
            <span class="text-[10px] space-y-0.5  text-black font-medium" title="{{ $noapp }}"><span class="opacity-70">Total Applications: </span> {{ $noapp }}</span>

        </div>
        <div>
            <div class="w-full flex pt-6 py-2 pb-2 px-4 justify-between mx-auto">
                @if(!str_contains($currentUrl,'myjobs'))
                    <a href="{{ route('jobs.view', $job->id) }}" title="view"
                        class="bg-green-400 mx-2 text-white px-3 py-1 rounded-md text-center text-[10px] hover:bg-green-500 hover:text-white">
                        <i class="fa fa-eye"></i> View
                    </a>
                    @if(Auth::user()?->role === 'user')
                        <a href="{{ route('jobs-apply', $job->id) }}" title="apply"
                            class="bg-blue-400 text-white px-3 py-1 rounded-md text-center text-[10px] hover:bg-blue-500 hover:border-blue-500">
                            <i class="fa fa-pencil-square-o" ></i> Apply
                        </a>
                    @endif
                @else
                    <div class="w-25 flex justify-between">
                        <a href="{{ route('jobs.update', $job->id) }}" title="edit"
                            class="text-green-500 px-2 py-1 font-sm font-medium rounded-md text-center text-sm ring-1 ring-green-500 hover:bg-green-500 hover:text-white">
                            <i class="fa fa-edit" ></i> 
                        </a>    
                        <button wire:click="showConfirmModal({{ $job->id }})" title="delete"
                            class="text-red-500 px-2 py-1 font-medium rounded-md text-center text-sm ring-1 ring-red-500  hover:bg-red-500 hover:text-white">
                            <i class="fa fa-trash" aria-hidden="true"></i> 
                        </button>     
                    </div>
                @endif
            </div>
        </div>
    </div>
    </a>
</div>
