<div class="flex space-x-2">
    <x-button.circle 
        icon="eye" 
        href="{{ route('home', $job->id) }}" 
        primary
        title="View"
    />
    <x-button.circle 
        icon="pencil" 
        href="{{ route('home', $job->id) }}" 
        secondary
        title="Edit"
    />
    <x-button.circle 
        icon="trash" 
        wire:click="confirmDelete({{ $job->id }})" 
        negative
        title="Delete"
    />
</div>