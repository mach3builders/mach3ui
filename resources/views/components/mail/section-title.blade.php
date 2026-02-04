@props([
    'title' => null,
])

<h3 style="font-size: 20px; font-weight: 600; color: #030304; margin: 0 0 24px; padding-bottom: 12px; border-bottom: 2px solid #dbdee1;">{{ $title ?? $slot }}</h3>
