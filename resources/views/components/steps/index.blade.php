@props([
    'current' => 1,
])

<div {{ $attributes }} data-steps data-current="{{ $current }}">
    <nav class="flex items-center justify-center gap-3">
        {{ $slot }}
    </nav>
</div>
