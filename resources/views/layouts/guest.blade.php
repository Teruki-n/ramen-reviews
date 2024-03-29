<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ramen Review Hub</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center sm:justify-center pt-6 sm:pt-0 bg-gradient-to-r from-red-500 to-yellow-500">
            <div class="px-4 sm:px-0">
                <a href="/">
                    <img class="mx-auto sm:mx-0 w-24 h-24 sm:w-32 sm:h-32" src="{{ asset('images/logo2.svg') }}" alt="ロゴ"/>
                </a>
            </div>

            <div class="w-full max-w-sm sm:max-w-md mt-6 px-6 py-4 bg-gray-50 shadow-md overflow-hidden sm:rounded-lg sm:">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>