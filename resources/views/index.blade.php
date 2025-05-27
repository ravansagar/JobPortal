<x-layouts.app title="Home Page" description="Welcome to the home page of our application.">
    <div class="bg-gray-200 w-full">
        @livewire('basic-info')
        @livewire('dropdown')
        @livewire('job-list')
    </div>
</x-layouts.app>