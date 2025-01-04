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
        <wireui:scripts />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div x-data="{ showAlert: true }"
                     x-init="setTimeout(() => showAlert = false, 3000)"
                     x-show="showAlert"
                     class="fixed top-0 right-0 mt-4 mr-4 py-12 justify-end z-50">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div>
                            @if (session()->has('alert'))
                                <div class="alert alert-success flex">
                                    <x-alert
                                        title="{{ session('alert.message') }}"
                                        :positive="session('alert.type')"
                                        class="{{ session('alert.class') }}"
                                        rounded="lg"
                                        solid
                                    />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
