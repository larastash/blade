<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script>
            (function() {
                const theme = localStorage.getItem('theme');
                let shouldBeDark = false;

                if (theme === 'dark') {
                    shouldBeDark = true;
                } else if (theme === 'system' || !theme) {
                    shouldBeDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                }

                if (shouldBeDark) {
                    document.documentElement.classList.add('dark');
                }
            })();
        </script>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body x-data="app">
        @yield('content')

        @livewireScriptConfig
        @fluxScripts

        @persist('toast')
            <flux:toast.group position="bottom end">
                <flux:toast />
            </flux:toast.group>
        @endpersist
    </body>
</html>
