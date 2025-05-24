<?php

use Livewire\Volt\Component;
use Illuminate\Pagination\LengthAwarePaginator;

new class extends Component {
    public $applicationsData = [];
    public $paginationData = [];
    

    public function mount($applicationsData = [], $paginationData = [])
    {
        
        $this->applicationsData = $applicationsData;
        $this->paginationData = $paginationData;
    }

    public function getApplicationsProperty()
    {
        return new LengthAwarePaginator(
            collect($this->applicationsData),
            $this->paginationData['total'] ?? 0,
            $this->paginationData['per_page'] ?? 10,
            $this->paginationData['current_page'] ?? 1,
            [
                'path' => $this->paginationData['path'] ?? url()->current(),
                'pageName' => 'page',
            ]
        );
    }

    public function viewApplication($id)
    {
        $this->dispatch('viewApplication', $id);
    }

    public function changeStatus($id)
    {
        $this->dispatch('openStatusModel', $id);
    }

    public function confirmDeleteApplication($id) {
        $this->dispatch('confirmDeleteApplication', $id);
    }
};

?>

<div class="bg-white shadow rounded-lg overflow-hidden" >
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Applicant
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Job
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Applied On
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($applicationsData as $application)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if($application['user']['image'])
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ asset($application['user']['image']) }}"
                                                    alt="{{ $application['user']['name'] }}" loading="lazy">
                                            @else
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-sm font-medium">
                                                    {{ substr($application['user']['name'], 0, 1) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $application['user']['name'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $application['user']['email'] }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $application['job']['name'] }}</div>
                                    <div class="text-xs text-gray-500">{{ Auth::user()?->company?->name }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $application['created_at']->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $application['created_at']->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                    {{ $application['status'] === 'applied' ? 'bg-blue-100 text-blue-800' :
                    ($application['status'] === 'interview' ? 'bg-purple-100 text-purple-800' :
                        ($application['status'] === 'hired' ? 'bg-emerald-100 text-emerald-800' :
                            ($application['status'] === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800'))) }}">
                                        {{ $application['status'] }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-4">
                                        <button wire:click="viewApplication({{ $application['id'] }})"
                                            class="text-indigo-600 hover:text-indigo-900" title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <button wire:click="confirmDeleteApplication({{ $application['id'] }})"
                                            class="text-red-600 hover:text-red-900" title="Delete Application">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center">
                            <div class="flex justify-center items-center">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No applications found</h3>
                                    <p class="mt-1 text-sm text-gray-500">No applications match your current filters.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
        {{ $this->applications->links() }}
    </div>
</div>