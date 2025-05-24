@php
    $svg = file_get_contents(public_path("storage/svg/{$name}.svg"));
    $svg = str_replace('<svg', "<svg class=\"{$class}\"", $svg);
@endphp

{!! $svg !!}
