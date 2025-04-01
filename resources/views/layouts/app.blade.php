<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PS Call Center Manager</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#112D4E] ">
    <x-navigation/>
    <div class="min-h-screen flex flex-col pt-[60px]">

            <!-- Page Content -->
        <main class="flex-grow px-2 md:px-0">
                {{ $slot }}
            </main>
            <x-footer />
        </div>
    </body>
</html>
