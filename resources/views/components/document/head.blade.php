@props([
    'favicon' => 'favicon.ico',
    'robots' => 'noindex, nofollow',
    'title' => null,
])

<head data-document-head>
    <title>{{ $title ?: View::yieldContent('title', config('app.name')) }}</title>
    <meta charset="utf-8" />
    <meta name="robots" content="{{ $robots }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        (function() {
            function applyTheme() {
                var t = localStorage.getItem('mach3ui-theme');
                var d = t === 'dark' || (!t && matchMedia('(prefers-color-scheme:dark)').matches);
                document.documentElement.classList.toggle('dark', d);
            }
            applyTheme();
            // document.addEventListener('livewire:navigate', applyTheme);
            // document.addEventListener('livewire:navigated', applyTheme);
        })();
    </script>

    <style>[x-cloak] {display: none}</style>

    <link href="{{ asset($favicon) }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,500,600,700|saira-semi-condensed:700&display=swap" />

    @stack('scripts')

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    {{ $slot }}
</head>
