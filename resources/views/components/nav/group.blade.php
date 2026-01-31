@props([
    'icon' => null,
    'open' => false,
    'routePrefix' => null,
    'title' => null,
])

@php
    $isOpen = $open || ($routePrefix && Route::is($routePrefix . '.*'));

    $classes = Ui::classes()->add('group');

    $summaryClasses = Ui::classes()
        ->add('flex cursor-pointer list-none items-center gap-2 rounded-md px-3 py-2 text-[13px] leading-5')
        ->add('text-gray-600 hover:bg-gray-50 hover:text-gray-900')
        ->add('dark:text-gray-300 dark:hover:bg-gray-780 dark:hover:text-gray-100')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0 [&>svg]:text-gray-400 [&>svg]:dark:text-gray-500')
        ->add('[&:hover>svg]:text-gray-500 [&:hover>svg]:dark:text-gray-400')
        ->add('[&::-webkit-details-marker]:hidden');
@endphp

<details {{ $attributes->class($classes) }} @if ($isOpen) open @endif>
    <summary class="{{ $summaryClasses }}">
        @if ($icon)
            <ui:icon :name="$icon" />
        @endif

        <span class="flex-1">{{ $title }}</span>

        <ui:icon name="chevron-right" class="transition-transform group-open:rotate-90" />
    </summary>

    <div class="ml-5 mt-1 flex flex-col gap-1 border-l border-gray-120 pl-3 dark:border-gray-700">
        {{ $slot }}
    </div>
</details>
