@props([
    'value' => null,
    'selected' => false,
])

<button
    type="button"
    {{ $attributes->class(['flex w-full cursor-pointer items-center gap-2 rounded-sm px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-40 dark:text-gray-200 dark:hover:bg-gray-760 aria-selected:bg-gray-50 aria-selected:font-medium dark:aria-selected:bg-gray-760']) }}
    data-value="{{ $value }}"
    @if($selected) aria-selected="true" @endif
>{{ $slot }}</button>
