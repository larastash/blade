<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
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

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        @livewireStyles

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-data="app">
        {{ $slot }}

        @livewireScriptConfig

        <x-toaster-hub />
    </body>
</html>
