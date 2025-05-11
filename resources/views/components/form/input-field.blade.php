@props(['name' => '', 'type' => 'text', 'placeholder' => ''])

<div class="mb-4 relative">
    <input 
        @if($name !== '') wire:model.lazy="{{ $name }}" @endif
        type="{{ $type }}"  
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full px-10 py-2 rounded-md bg-white/20 placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-purple-300']) }} 
    />

    @if($slot)
        <span class="absolute left-3 top-2.5 text-white flex items-center space-x-2">
            {{ $slot }}
        </span>
    @endif

    @error($name) 
        <span class="text-red-400 text-xs">{{ $message }}</span> 
    @enderror
</div>
