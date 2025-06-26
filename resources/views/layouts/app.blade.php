<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @session("message")
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 max-w-lg w-full bg-green-400 border border-green-800 text-white px-6 py-4 rounded shadow"
                >
                    <div class="flex justify-between items-start">
                        <div class="text-ms">
                            {{ session('message') }}
                        </div>
                        <button @click="show = false" class="text-white text-xl font-bold ml-4">
                            &times;
                        </button>
                    </div>
                </div>
            @endsession
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="flex flex-wrap justify-between max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                        @isset($newnode)
                        {{ $newnode}}
                        @endisset
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!-- Error Logging -->
            @if ($errors->any())
                <div 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 max-w-lg w-full bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded shadow"
                >
                    <div class="flex justify-between items-start">
                        <div class="text-sm">
                            <strong class="font-semibold">Whoops!</strong>
                            <ul class="mt-1 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button 
                            @click="show = false"
                            class="text-red-700 hover:text-red-900 text-xl font-bold ml-4"
                        >
                            &times;
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </body>
</html>
