@props([
    'name' => null,
    'message' => null,
    'bag' => 'default',
])

@php
    $error_message = $message ?? ($name ? $errors->getBag($bag)->first($name) : null);
@endphp

@if ($error_message)
    <p {{ $attributes->class([
        'flex items-center gap-1.5 text-xs',
        'text-red-600',
        'dark:text-red-500',
    ]) }} data-error>
        <ui:icon name="circle-alert" class="size-3.5 shrink-0" />

        <span>{{ $error_message }}</span>
    </p>
@endif
