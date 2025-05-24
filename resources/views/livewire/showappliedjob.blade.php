<?php

use Livewire\Volt\Component;
use App\Models\ApplyJob;

new class extends Component {
    public $currentApplication;
    public $showPdf = false;
    public $appId = null;

    public function mount(){

        if($this->appId != null){
            $this->currentApplication = ApplyJob::findOrFail($this->appId);
        }

    }

    public function changeStatus($id){
        $this->dispatch('openStatusModal', $id);
    }

    public function confirmDeleteApplication($id) {
        $this->dispatch('confirmDeleteApplication', $id);
    }
}; 

?>

<div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6" >
    <div class="md:col-span-1">
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center mb-4">
                @if($currentApplication->user->image)
                    <img class="h-16 w-16 rounded-full object-cover" src="{{ asset($currentApplication->user->image) }}"
                        alt="{{ $currentApplication->user->name }}" loading="lazy">
                @else
                    <div
                        class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xl font-bold">
                        {{ substr($currentApplication->user->name, 0, 1) }}
                    </div>
                @endif
                <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900">{{ $currentApplication->user->name }}</h4>
                    <p class="text-sm text-gray-500">{{ $currentApplication->user->email }}</p>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <dl>
                    <div class="py-2">
                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $currentApplication->user->phone ?? 'Not provided' }}
                        </dd>
                    </div>
                    <div class="py-2">
                        <dt class="text-sm font-medium text-gray-500">Location</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $currentApplication->user->location ?? 'Not provided' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <div class="md:col-span-2">
        <div class="bg-white rounded-lg border border-gray-200 p-4 mb-4">
            <h4 class="text-lg font-medium text-gray-900 mb-2">Application for {{ $currentApplication->job->name }}
            </h4>
            <div class="flex items-center mb-4">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                    {{ $currentApplication->status === 'applied' ? 'bg-blue-100 text-blue-800' :
                    ($currentApplication->status === 'interview' ? 'bg-yellow-100 text-yellow-800' :
                    ($currentApplication->status === 'hired' ? 'bg-emerald-100 text-emerald-800' :
                    ($currentApplication->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800'))) }}">
                    {{ $currentApplication->status }}
                </span>
                <span class="ml-2 text-sm text-gray-500">Applied on
                    {{ $currentApplication->created_at->format('M d, Y') }}</span>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <h5 class="text-sm font-medium text-gray-700 mb-2">Documents</h5>
                <div class="space-y-3">
                    @if($currentApplication->resume)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span class="ml-2 text-sm font-medium text-gray-900">Resume/CV</span>
                            </div>
                            <button wire:click="$set('showPdf', true)"
                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                View
                            </button>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">No resume/CV provided</p>
                    @endif

                    @if($currentApplication->cover_letter)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <p>{!! $currentApplication->cover_letter !!}</p>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">No cover letter provided</p>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::user()->role === 'agent')
        <div class="flex justify-end space-x-3">
            <button wire:click="changeStatus({{ $currentApplication->id }})"
                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Change Status
            </button>
            <button wire:click="confirmDeleteApplication({{ $currentApplication->id }})"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Delete Application
            </button>
        </div>
        @endif
    </div>
    @if($showPdf)
        <div class="fixed inset-0 z-50 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="relative w-full max-w-4xl h-[90vh] bg-white rounded shadow-lg overflow-hidden">
                <button wire:click="$set('showPdf', false)"
                    class="absolute top-2 right-2 z-50 bg-white rounded-full p-2 text-gray-700 hover:text-red-500 shadow"
                    title="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <iframe src="{{ asset('storage/job/resume/' . basename($currentApplication->resume)) }}"
                    class="w-full h-full" frameborder="0"></iframe>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('livewire/update', () => {
            Livewire.dispatch('$refresh');
    });
});
</script>
</div>