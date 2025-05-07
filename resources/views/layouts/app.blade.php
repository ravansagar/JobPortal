<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @livewireStyles
    </head>
    <body class="bg-gray-900">
        <div class="py-2">
            @livewire('navbar')
        </div>
        <div class="container mx-auto pb-4">
            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>
