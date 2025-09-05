<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=press-start-2p|figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="css.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body >
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 px-4">

        <!-- Logo -->
        <div class="mb-6">
            <a href="/">
                <x-application-logo class="w-24 h-24 text-fuchsia-300 hover:text-white transition" />
            </a>
        </div>

        <!-- Content Container -->
        <div class="w-full sm:max-w-md bg-fuchsia-950/60 backdrop-blur-sm shadow-[0_0_30px_rgba(255,0,255,0.3)] border border-fuchsia-500/30 rounded-2xl px-8 py-6">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
