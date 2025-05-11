<div class="w-[100vw] bg-gray-900 !my-0">
    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-4 gap-4 px-15 py-4">
        @foreach ($jobs as $job)
            <livewire:job-card :job="$job" :key="$job->id" />
        @endforeach
    </div>

    <div class="px-19 py-2">
        {{ $jobs->links() }} 
    </div>
</div>
