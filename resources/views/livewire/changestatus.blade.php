<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    
    public $currentApplication;
    public $statuses;

    #[Validate('required|string')]
    public $newStatus;

    public function submitStatusUpdate(){
        $this->dispatch('updateStatus', $this->newStatus);
    }

    public function hideStatusModel(){
        $this->dispatch('hideStatusModel');
    }
    
}; ?>



<div class="mt-4">
    <p class="text-sm text-gray-500 mb-4">
        Update the status for {{ $currentApplication->user->name }}'s application for {{ $currentApplication->job->title }}.
    </p>

    <div class="mb-4">
        <label for="newStatus" class="block text-sm font-medium text-gray-700">Status</label>
        <select 
            id="newStatus" 
            wire:model="newStatus" 
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
        >
        <option value="{{ $currentApplication->status }}" selected="true" hidden>{{ $currentApplication->status }}</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
        <button 
            wire:click="submitStatusUpdate" 
            type="button" 
            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
        >
            Update Status
        </button>
        <button 
            wire:click="hideStatusModel" 
            type="button" 
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
        >
            Cancel
        </button>
    </div>
</div>
