@props([])

@php
    $classes = Ui::classes()->add('flex items-center justify-center px-1')->merge($attributes->only('class'));
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-input-otp-separator>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <div class="size-1.5 rounded-full bg-gray-300 dark:bg-gray-600"></div>
    @endif
</div>
