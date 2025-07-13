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
        <!-- Simplified Navigation for Auth Pages -->
        <nav class="bg-white/10 backdrop-blur-md shadow-lg border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                            <x-application-logo class="h-12 w-auto" />
                            <span class="text-lg font-bold text-white group-hover:text-orange-300 transition-all duration-300">
                                Pondok Paranginan 2
                            </span>
                        </a>
                    </div>

                    <!-- Auth Links -->
                    <div class="flex items-center space-x-4">
                        @if(request()->routeIs('login'))
                            <a href="{{ route('register') }}" class="text-white hover:text-orange-300 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                                <i class="fas fa-user-plus mr-2"></i>Daftar
                            </a>
                        @elseif(request()->routeIs('register'))
                            <a href="{{ route('login') }}" class="text-white hover:text-orange-300 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-orange-300 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                            <a href="{{ route('register') }}" class="text-white hover:text-orange-300 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                                <i class="fas fa-user-plus mr-2"></i>Daftar
                            </a>
                        @endif
                        
                        <a href="{{ route('home') }}" class="text-white hover:text-orange-300 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300">
                            <i class="fas fa-home mr-2"></i>Beranda
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800">
            <!-- Animated background elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-20 left-20 w-72 h-72 bg-orange-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
                <div class="absolute top-40 right-20 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-20 left-40 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse" style="animation-delay: 4s;"></div>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-8 bg-white/10 backdrop-blur-lg border border-white/20 shadow-2xl overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
