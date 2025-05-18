@php
    $personalize = $classes();
    $personalize = array_merge($personalize, [ 
        'item' => 'text-gray-800', 
        'wrapper' => 'grid grid-cols-1 py-1 bg-gray-200 max-w-[20vw]', 
        'col' => 'text-center', 
    ]);
@endphp

<div class="{{ $personalize['wrapper'] }}">
    <{{ $tag }} @if ($href) href="{{ $href }}" @else role="menuitem" @endif tabindex="0"
        {{ $attributes->class([
            $personalize['item'], 
            $personalize['col'],
            $personalize['border'] => $separator,
        ]) }}>
        {!! $text ?? $slot !!}
    </{{ $tag }}>
</div>
