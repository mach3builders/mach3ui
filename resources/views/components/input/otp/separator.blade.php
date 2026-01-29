@props([])

<div
    {{ $attributes->class([
        'flex items-center justify-center px-1',
    ]) }}
    data-input-otp-separator
>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <div class="h-1 w-2 rounded-full bg-gray-300 dark:bg-gray-600"></div>
    @endif
</div>
