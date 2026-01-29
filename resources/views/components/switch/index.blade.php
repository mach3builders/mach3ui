@props([
    'checked' => false,
    'description' => null,
    'disabled' => false,
    'label' => null,
    'name' => null,
])

@php
    $id = $attributes->get('id') ?? ($name ? 'switch-' . $name : 'switch-' . uniqid());

    $track_classes = [
        'relative inline-flex h-5 w-9 shrink-0 cursor-pointer items-center rounded-full transition-colors',
        'bg-gray-200',
        'dark:bg-gray-620',
        'has-[:checked]:bg-blue-500',
        'dark:has-[:checked]:bg-blue-600',
        'has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50',
    ];

    $thumb_classes = [
        'pointer-events-none inline-block h-4 w-4 translate-x-0.5 rounded-full shadow-sm transition-transform duration-200',
        'bg-white',
    ];
@endphp

@if ($label || $description)
    <div {{ $attributes->only('class')->class(['flex items-start gap-3']) }} data-switch>
        <label for="{{ $id }}" @class($track_classes)>
            <input
                type="checkbox"
                role="switch"
                id="{{ $id }}"
                @if ($name) name="{{ $name }}" @endif
                {{ $attributes->except(['class', 'id'])->class(['peer sr-only']) }}
                @checked($checked)
                @disabled($disabled)
            />

            <span @class(array_merge($thumb_classes, ['peer-checked:translate-x-4']))></span>
        </label>

        <label for="{{ $id }}" class="flex flex-col gap-0.5">
            <span class="text-sm font-medium text-gray-800 dark:text-gray-100">{{ $label }}</span>

            @if ($description)
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</span>
            @endif
        </label>
    </div>
@else
    <label for="{{ $id }}" {{ $attributes->only('class')->class($track_classes) }} data-switch>
        <input
            type="checkbox"
            role="switch"
            id="{{ $id }}"
            @if ($name) name="{{ $name }}" @endif
            {{ $attributes->except(['class', 'id'])->class(['peer sr-only']) }}
            @checked($checked)
            @disabled($disabled)
        />

        <span @class(array_merge($thumb_classes, ['peer-checked:translate-x-4']))></span>
    </label>
@endif
