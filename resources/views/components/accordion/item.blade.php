@props([
    'icon' => null,
    'open' => false,
    'title' => null,
])

@php
    $itemClasses = Ui::classes()->add('group border-b border-gray-100 dark:border-gray-680');

    $titleClasses = Ui::classes()
        ->add('flex w-full cursor-pointer select-none items-center gap-2 py-4 text-left font-medium')
        ->add('text-gray-900 dark:text-white')
        ->add('hover:underline');

    $contentClasses = Ui::classes()
        ->add('overflow-hidden pb-4')
        ->add('text-gray-600 dark:text-gray-400')
        ->when($icon, 'pl-6');

    $iconClasses = Ui::classes()->add('size-4 text-gray-400 dark:text-gray-500');

    $chevronClasses = Ui::classes()->add('size-4 shrink-0 transition-transform duration-200 group-open:rotate-180');
@endphp

<details {{ $attributes->class($itemClasses) }} @if ($open) open @endif data-accordion-item>
    <summary class="{{ $titleClasses }}"
        x-on:click.prevent="
            const details = $el.closest('details');
            const parent = details.closest('[data-accordion][data-type=single]');
            if (parent && !details.open) {
                parent.querySelectorAll('details[open]').forEach(d => d.open = false);
            }
            details.open = !details.open;
        "
        data-accordion-title>
        @if ($icon)
            <ui:icon :name="$icon" :class="$iconClasses" />
        @endif

        <span class="grow">{{ $title }}</span>

        <ui:icon name="chevron-down" :class="$chevronClasses" />
    </summary>

    <div class="{{ $contentClasses }}" data-accordion-content>
        {{ $slot }}
    </div>
</details>
