@props([
    'clickable' => false,
    'nested' => false,
    'selected' => null,
])

@php
    $isClickable =
        $clickable && (
            $attributes->has('data-href') ||
            $attributes->whereStartsWith('wire:click')->isNotEmpty() ||
            $attributes->has('x-on:click') ||
            $attributes->whereStartsWith('@click')->isNotEmpty()
        );

    // Check if selected is an Alpine expression (string) or a static boolean
    $isAlpineSelected = is_string($selected) && $selected !== '';
    $isStaticSelected = $selected === true;

    $selectedClasses = '*:bg-gray-10 dark:*:bg-gray-790';

    $classes = Ui::classes()
        ->add('group')
        ->when($isClickable, 'cursor-pointer *:transition-colors hover:*:bg-gray-20 dark:hover:*:bg-gray-790')
        ->when($isStaticSelected, $selectedClasses)
        ->merge($attributes->only('class'));
@endphp

<tr class="{{ $classes }}" {{ $attributes->except('class')->when(! $isClickable, fn ($attrs) => $attrs->whereDoesntStartWith(['wire:click', 'x-on:click', '@click'])->except('data-href')) }}
    @if ($isAlpineSelected) x-bind:class="{{ $selected }} && '{{ $selectedClasses }}'" @endif
    @if ($nested) x-show="expanded" x-cloak @endif data-tr>
    {{ $slot }}
</tr>
