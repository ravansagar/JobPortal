<div>

    @if($showTags)
        <div class="w-full max-h-2xl bg-white/90 p-4 px-15 flex flex-wrap gap-2">
            @foreach ($tags as $tag)
                <div class="px-3 py-1 bg-green-500 text-black/70 rounded">
                    <button wire:click="filterByTag({{ $tag->id }})" class="cursor-pointer">{{ $tag->name }}</button>
                </div>
            @endforeach
        </div>
    @elseif($showCompany)
        <div class="w-full max-h-2xl bg-white/90 p-4 px-15 flex flex-wrap gap-2">
            @foreach ($companies as $company)
                <div class="px-3 py-1 bg-green-500 text-black/70 rounded">
                    <button wire:click="filterByCompany({{ $company->id }})" class="cursor-pointer">{{ $company->name }}</button>
                </div>
            @endforeach
        </div>
    @endif

</div>