@props([
    'help' => null,
    'label' => null,
    'resize' => false,
    'size' => null,
])

@php
    $id = $attributes->get('id') ?? ($label ? 'textarea-' . Str::random(8) : null);
    $name = $attributes->get('name') ?? $attributes->whereStartsWith('wire:model')->first();
    $has_error = $name && $errors->has($name);

    $size_classes = match ($size) {
        'sm' => 'min-h-20 px-2.5 py-1.5 text-xs',
        'lg' => 'min-h-40 px-4 py-3 text-base',
        default => 'min-h-32 px-3 py-2.5 text-sm',
    };

    $textarea_classes = [
        'block w-full max-h-96 appearance-none rounded-md border shadow-xs',
        'border-gray-140 bg-white text-gray-900 placeholder-gray-400',
        'dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500',
        'focus:border-gray-400 focus:outline-none',
        'dark:focus:border-gray-500',
        'disabled:cursor-not-allowed disabled:opacity-50',
        $size_classes,
        'resize-none' => !$resize,
        'resize-y' => $resize,
        'border-red-500 dark:border-red-500 focus:border-red-500 dark:focus:border-red-500' => $has_error,
    ];
@endphp

@if ($label)
    <ui:field>
        <ui:label :for="$id">{{ $label }}</ui:label>

        <textarea x-data="{
            resize() {
                $el.style.height = 'auto';
                $el.style.height = Math.min($el.scrollHeight, 384) + 'px';
            }
        }" x-init="resize()" x-on:input="resize()" {{ $attributes->class($textarea_classes) }}
            id="{{ $id }}" data-textarea>{{ $slot }}</textarea>

        @if ($help)
            <ui:help>{{ $help }}</ui:help>
        @endif

        @if ($name)
            <ui:error :name="$name" />
        @endif
    </ui:field>
@else
    <textarea x-data="{
        resize() {
            $el.style.height = 'auto';
            $el.style.height = Math.min($el.scrollHeight, 384) + 'px';
        }
    }" x-init="resize()" x-on:input="resize()" {{ $attributes->class($textarea_classes) }}
        data-textarea>{{ $slot }}</textarea>
@endif
