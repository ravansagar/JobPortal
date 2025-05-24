<div class="min-h-screen w-[100vw] flex items-center justify-center bg-gray-200  text-white p-4">
    <div class="bg-white backdrop-blur-lg p-6 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-3xl text-gray-800 font-bold mb-4">{{ $job->name }}</h2>

        @if ($job->image)
            <div class="relative w-64 max-h-64 mx-auto mb-4">
                <div
                    class="absolute inset-0  rounded-lg  bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 animate-gradient-spin">
                    <div class="w-full h-full bg-white rounded-lg"></div>
                </div>
                <img src="{{ asset($job->image) }}" alt="{{ $job->name }}" class="relative w-full h-auto rounded-lg z-10"
                    loading="lazy">
            </div>
        @endif
        <p class="text-black/90 mb-2"><strong>Description:</strong> 
            <div style="color: black !important;">
                {!! $job->description !!}
            </div>
        </p>
        <p class="text-black/80 mb-2"><strong>Salary:</strong> $ {{ number_format($job->salary) }}</p>
        <p class="text-black/90 mb-2"><strong>Tag:</strong> {{ $job->tag->name ?? 'N/A' }}</p>
        <p class="text-black/90 text-sm"><strong>Posted by:</strong> {{ $job->user->name ?? 'Unknown' }}</p>
        <div class="w-full flex justify-between px-8">
            <a href="{{ redirect()->back()->getTargetUrl() }}"
                class="inline-block mt-4 px-4 py-2 bg-gray-400 font-semibold text-white rounded hover:bg-gray-500 hover:text-white transition duration-300 ease-in-out">
                &larr; Back
            </a>
            <a href="{{ route('jobs-apply', $job->id) }}"
                class="inline-block mt-4 px-4 py-2 bg-blue-400 font-semibold text-white rounded hover:bg-blue-500 transition duration-300 ease-in-out">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Apply
            </a>
        </div>
    </div>
</div>