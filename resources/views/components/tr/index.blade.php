@props([
    'clickable' => false,
    'nested' => false,
    'selected' => false,
])

@php
    $isClickable =
        $clickable ||
        $attributes->has('data-href') ||
        $attributes->whereStartsWith('wire:click')->isNotEmpty() ||
        $attributes->has('x-on:click') ||
        $attributes->whereStartsWith('@click')->isNotEmpty();

    $classes = Ui::classes()
        ->add('group')
        ->when($isClickable, 'cursor-pointer transition-colors hover:[&_td]:bg-gray-20 dark:hover:[&_td]:bg-gray-790')
        ->when($selected, '[&_td]:bg-gray-10 dark:[&_td]:bg-gray-790')
        ->merge($attributes->only('class'));
@endphp

<tr class="{{ $classes }}" {{ $attributes->except('class') }}
    @if ($nested) x-show="expanded" x-cloak @endif data-tr>
    {{ $slot }}
</tr>
