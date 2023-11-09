<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Alerts -->
        @if (session('success'))
            <div class="my-3 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div role="alert"
                    class="rounded-lg border border-green-700 bg-green-100 p-2 sm:p-4 text-green-700 opacity-75">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="my-3 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div role="alert"
                    class="rounded-lg border border-red-700 bg-red-100 p-2 sm:p-4 text-red-700 opacity-75">
                    <p class="font-bold">Error!</p>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
