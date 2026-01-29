@props([
    'code',
    'message' => null,
])

@php
    $title = __("errors.{$code}_title");
    $description = $message ?: __("errors.{$code}_body");
@endphp

<div
    {{ $attributes->class([
        'flex flex-col items-center justify-center h-full text-center',
    ]) }}
    data-layout-error
>
    <div class="w-full max-w-lg flex flex-col items-center">
        <h1 @class([
            'text-[6rem] leading-none font-semibold tracking-tight',
            'text-gray-800',
            'dark:text-gray-100',
        ])>{{ $title }}</h1>

        <p @class([
            'mt-1 max-w-sm text-sm',
            'text-gray-500',
            'dark:text-gray-400',
        ])>{{ $description }}</p>

        <div class="mt-8">
            <ui:button href="/" icon="arrow-left">{{ __('common.go_back') }}</ui:button>
        </div>
    </div>
</div>
