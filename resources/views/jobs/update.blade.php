<div>
    @auth
        <livewire:update-job :id="$id" />
        @livewire('add-tag')
    @endauth
</div>
