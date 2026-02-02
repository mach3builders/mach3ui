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

    <link href="{{ asset($favicon) }}" rel="shortcut icon" type="image/x-icon" />

    @uiStyles
    @uiScripts

    @stack('scripts')

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    {{ $slot }}
</head>
