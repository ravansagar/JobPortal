<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Models\ApplyJob;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


new class extends Component {

    use WithPagination;

    public ?int $quantity = 5;

    public $user;

    public function loadApplications()
    {
        $this->user = Auth::user();
        return ApplyJob::where('user_id', $this->user->id)
            ->with('job')
            ->latest()
            ->paginate($this->quantity);
    }


    public function with()
    {
        return [
            'applications' => $this->loadApplications()
        ];
    }

}; 
    ?>

<div>
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-4 sm:px-6">
            <h3 class="text-xl leading-6 font-medium text-gray-900">Your Job Applications</h3>
            <p class="mt-1 max-w-2xl text-[12px] text-gray-500">Track the status of your job applications</p>
        </div>

        @if(count($applications) > 0)
            <div class="border-t border-gray-200 divide-y divide-gray-200">
                @foreach($applications as $application)
                    <div class="px-4 py-2 sm:px-6 hover:bg-gray-50">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="mb-1 md:mb-0">
                                <h4 class="text-sm font-medium text-gray-900">{{ $application->job->name }}</h4>
                                <div class="mt-1 flex items-center">
                                    <p class="text-sm text-gray-500">{{ $application->job->user?->company->name }}</p>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <p class="text-sm text-gray-500">{{ $application->job->user?->company->location }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:space-x-3">
                                <div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $application->status === 'Applied' ? 'bg-blue-100 text-blue-800' :
                                        ($application->status === 'Interviewing' ? 'bg-yellow-100 text-yellow-800' :
                                        ($application->status === 'Offered' ? 'bg-green-100 text-green-800' :
                                        ($application->status === 'Rejected' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800'))) }}">
                                        {{ $application->status }}
                                    </span>
                                </div>
                                <span class="inline-flex items-center text-sm text-gray-500">
                                    Applied on {{ \Carbon\Carbon::parse($application->created_at)->format('M d, Y') }}
                                </span>
                                <button
                                    class="mt-2 sm:mt-0 inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="px-4 py-12 text-center border-t border-gray-200">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No applications</h3>
                <p class="mt-1 text-sm text-gray-500">You haven't applied to any jobs yet.</p>
                <div class="mt-6">
                    <a href="{{route('home')}}"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Browse Jobs
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="mt-4">
        {{ $applications->links() }}
    </div>
</div>