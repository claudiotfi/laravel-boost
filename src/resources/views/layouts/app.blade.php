<!DOCTYPE html">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    @auth
@if (Auth::user()->dark_mode)
        class="dark"
    @endif @endauth>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full font-sans antialiased bg-white text-slate-950 dark:bg-gray-900 dark:text-slate-100 ">
    <div class="flex h-full justify-between ps-14">
        @include('layouts.sidebar')
        <div class="flex-grow h-full relative">
            <!-- Page Heading -->
            <header
                class="fixed top-0 right-0 h-14 max-h-14 bg-gray-200 bg-opacity-50 dark:bg-opacity-50 text-slate-950 dark:bg-gray-700 dark:text-white shadow"
                style="left:3.5rem;">
                <div class="w-full p-5 py-2">
                    <div class="grid grid-cols-2 h-10">
                        <div class="flex items-center">
                            @if (isset($header))
                                {{ $header }}
                            @endif
                        </div>
                        <div class="flex justify-end gap-2">
                            @if (isset($tools))
                                {{ $tools }}
                            @endif
                        </div>
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <main class="h-full content px-5 pb-5 pt-20">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
