@props([
    'value' => null,
    'selected' => false,
])

@php
    $classes = Ui::classes()
        ->add('flex w-full cursor-pointer items-center gap-2 rounded-sm px-3 py-2 text-left text-sm')
        ->add('text-gray-700 hover:bg-gray-40 aria-selected:bg-gray-50 aria-selected:font-medium')
        ->add('dark:text-gray-200 dark:hover:bg-gray-760 dark:aria-selected:bg-gray-760');
@endphp

<button type="button" {{ $attributes->class($classes) }} data-value="{{ $value }}"
    @if ($selected) aria-selected="true" @endif>{{ $slot }}</button>
