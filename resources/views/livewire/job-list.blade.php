<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 mx-8 my-4 lg:grid-cols-4 gap-4 pl-8">
        @foreach ($jobs as $job)
            <livewire:job-card :job="$job" :key="$job->id" />
        @endforeach
    </div>

    <div class="mt-4 pl-8 pr-8">
        {{ $jobs->links() }} 
    </div>
</div>