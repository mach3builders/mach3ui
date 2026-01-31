@props([
    'hasIcon' => false,
    'hasIconTrailing' => false,
    'icon' => null,
    'iconTrailing' => null,
    'id' => null,
    'inputClasses' => '',
    'type' => 'text',
])

@php
    $needsWrapper = $hasIcon || $hasIconTrailing;
@endphp

@if ($needsWrapper)
    <div class="relative w-full" data-input-wrapper>
        @if ($hasIcon)
            <div
                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
                <ui:icon :name="$icon" class="size-4" />
            </div>
        @endif

        <input type="{{ $type }}" @if ($id) id="{{ $id }}" @endif class="{{ $inputClasses }}"
            {{ $attributes->except('class') }} data-input />

        @if ($hasIconTrailing)
            <div
                class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
                <ui:icon :name="$iconTrailing" class="size-4" />
            </div>
        @endif
    </div>
@else
    <input type="{{ $type }}" @if ($id) id="{{ $id }}" @endif class="{{ $inputClasses }}"
        {{ $attributes->except('class') }} data-input />
@endif
