<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rumah Makan Pondok Paranginan 2') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('Logo RMP.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Full Navigation Bar -->
        @include('layouts.navigation')

        <!-- Auth Content Area -->
        <div class="min-h-screen bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800 flex items-center justify-center p-4">
            <!-- Animated background elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-20 left-20 w-72 h-72 bg-orange-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
                <div class="absolute top-40 right-20 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-20 left-40 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 4s;"></div>
            </div>

            <!-- Auth Container -->
            <div class="relative z-10 w-full max-w-md">
                <div class="bg-white/10 backdrop-blur-lg border border-white/20 shadow-2xl rounded-3xl p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html> 