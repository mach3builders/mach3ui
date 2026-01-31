@props([
    'icon' => null,
    'open' => false,
    'title' => null,
])

@php
    $id = uniqid('accordion-');

    $itemClasses = Ui::classes()
        ->add('group border-b border-gray-100')
        ->add('dark:border-gray-680')
        ->merge($attributes->only('class'));

    $titleClasses = Ui::classes()
        ->add('flex w-full cursor-pointer select-none items-center gap-2 py-4 text-left font-medium')
        ->add('text-gray-900 hover:underline')
        ->add('dark:text-white');

    $contentClasses = Ui::classes()
        ->add('overflow-hidden pb-4 text-gray-600')
        ->add('dark:text-gray-400')
        ->when($icon, 'pl-6');

    $iconClasses = Ui::classes()->add('size-4 text-gray-400')->add('dark:text-gray-500');

    $chevronClasses = Ui::classes()->add('size-4 shrink-0 transition-transform duration-200 group-open:rotate-180');
@endphp

<details x-data="{ id: '{{ $id }}', localOpen: @js($open) }"
    x-effect="
        const parent = $el.closest('[data-accordion]');
        const isSingle = parent?.dataset.type === 'single';
        $el.open = isSingle ? Alpine.$data(parent).active === id : localOpen;
    "
    class="{{ $itemClasses }}" {{ $attributes->except('class') }} data-accordion-item>
    <summary
        x-on:click.prevent="
            const parent = $el.closest('[data-accordion]');
            const isSingle = parent?.dataset.type === 'single';
            if (isSingle) {
                $dispatch('accordion-toggle', id);
            } else {
                localOpen = !localOpen;
            }
        "
        class="{{ $titleClasses }}" data-accordion-title>
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
