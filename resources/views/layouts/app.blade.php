<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        @livewireStyles
    </head>
    <body class="overflow-x-hidden h-[100vh] w-[100vw] bg-gray-900">
        <div >
            @livewire('navbar')
        </div>
        <div class="container w-[100vw]">
            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>
