@props([
    'icon' => null,
])

<summary
    {{ $attributes->class([
        'flex w-full items-center gap-2 py-4 text-left font-medium',
        'text-gray-900 hover:underline',
        'dark:text-white',
    ]) }}
    x-on:click.prevent="
        const parent = $el.closest('[data-accordion-type]');
        if (parent && parent.dataset.accordionType === 'single') {
            Alpine.$data(parent).toggle($el.closest('details').dataset.value);
        } else {
            $el.closest('details').toggleAttribute('open');
        }
    "
>
    @if ($icon)
        <ui:icon
            :name="$icon"
            class="size-4 text-gray-400 dark:text-gray-500"
        />
    @endif

    <span class="grow">{{ $slot }}</span>

    <ui:icon
        name="chevron-down"
        class="size-4 transition-transform duration-200 group-open:rotate-180"
    />
</summary>
