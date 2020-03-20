<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'covid19 notifier') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="bg-black">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-white font-bold">
                        DEVSCAST
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline">
                            <a href="{{ route('dashboard')  }}"
                               class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-green-700 focus:outline-none">Dashboard</a>
                            <a href="{{ route('notification.index')  }}"
                               class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-green-700 focus:outline-none">Notifier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow">
        <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-6">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                Covid19 Notifier
            </h2>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 mt-10">
        @yield('content')
    </main>
    <footer class='w-full text-gray-500 text-xs text-center mt-5 mb-5'>
        <a href="https://twitter.com/BernardNgandu" target="_blank">Powered by @BernardNgandu</a>
    </footer>
</div>
</body>
</html>
