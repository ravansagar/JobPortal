<div class="w-[100vw] bg-gray-200 !my-0">
    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-4 gap-4 px-15 py-4">
        @foreach ($jobs as $job)
            <livewire:job-card :job="$job" :key="$job->id" currentUrl="{{$currentUrl}}" />
        @endforeach
    </div>

    <div class="px-19 py-2 !dark:text-gray-900 !text-gray-900">
        {{ $jobs->links() }} 
    </div>
</div>
