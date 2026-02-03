@props([
    'icon' => null,
    'open' => false,
    'title',
])

@php
    $key = Str::slug($title);

    $classes = Ui::classes()
        ->add('group')
        ->merge($attributes);

    $triggerClasses = Ui::classes()
        ->add('flex w-full items-center gap-2 rounded-md px-3 py-2 text-[13px] leading-5 text-left')
        ->add('text-gray-600 hover:bg-black/5 hover:text-gray-900')
        ->add('dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-100')
        ->add('[&>svg]:size-4 [&>svg]:shrink-0 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-500')
        ->add('[&:hover>svg]:text-gray-500 dark:[&:hover>svg]:text-gray-400');

    $contentClasses = Ui::classes()
        ->add('ml-5 mt-1 flex flex-col gap-1 border-l pl-3')
        ->add('border-gray-200 dark:border-gray-700');
@endphp

<div
    x-data="{ open: {{ $open ? 'true' : 'false' }} }"
    data-nav-group
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
>
    <button
        type="button"
        x-on:click="open = !open"
        :aria-expanded="open"
        class="{{ $triggerClasses }}"
    >
        @if($icon)
            <ui:icon :name="$icon" />
        @endif

        <span class="flex-1">{{ $title }}</span>

        <ui:icon
            name="chevron-right"
            class="transition-transform duration-200"
            x-bind:class="open && 'rotate-90'"
        />
    </button>

    <div x-show="open" x-collapse x-cloak class="{{ $contentClasses }}">
        {{ $slot }}
    </div>
</div>
