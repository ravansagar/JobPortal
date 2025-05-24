@props(['name' => '', 'type' => 'text', 'placeholder' => ''])

<div class="mb-4 relative">
    <input 
        @if($name !== '') wire:model="{{ $name }}" @endif
        type="{{ $type }}"  
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full px-10 py-2 rounded-md bg-white/70 ring-1 ring-gray-4  00 placeholder-black text-black focus:outline-none focus:ring-2 focus:ring-purple-300']) }} 
        required
    />

    @if($slot)
        <span class="absolute left-3 top-2.5 text-gray-800 flex items-center space-x-2">
            {{ $slot }}
        </span>
    @endif

    @error($name) 
        @php
            $previousPath = parse_url(url()->previous(), PHP_URL_PATH);
            $isFromDelete = $name == 'password' && $previousPath === '/delete'; 
        @endphp
        <span class="{{ $isFromDelete ? 'text-white' : 'text-red-500' }} text-xs">
            {{ $message }}
        </span>
    @enderror
</div>
