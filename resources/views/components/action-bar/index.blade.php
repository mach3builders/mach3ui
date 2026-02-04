@props([
    'count' => null,
    'countLabel' => 'selected',
])

@php
    $moreSlot = $__laravel_slots['more'] ?? null;

    $classes = Ui::classes()
        ->add('inline-flex h-10 items-center gap-1 rounded-lg border p-1')
        ->add('border-gray-200 bg-gray-20 dark:border-gray-700 dark:bg-gray-820')
        ->merge($attributes);

    $countClasses = Ui::classes()
        ->add('flex items-center gap-1.5 whitespace-nowrap px-2.5 py-1.5 text-xs font-medium');

    $actionsClasses = Ui::classes()
        ->add('flex items-center gap-1');
@endphp

<div
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    x-data="{ count: @js($count) }"
    data-action-bar
>
    <template x-if="count !== null">
        <div class="flex items-center gap-1">
            <span class="{{ $countClasses }}" data-action-bar-count>
                <span x-text="count"></span>
                <span>{{ $countLabel }}</span>
            </span>
            <ui:divider orientation="vertical" variant="subtle" />
        </div>
    </template>

    <div class="{{ $actionsClasses }}" data-action-bar-actions>
        {{ $slot }}
    </div>

    @if ($moreSlot?->isNotEmpty())
        <ui:divider orientation="vertical" variant="subtle" class="my-1" />

        <ui:dropdown position="bottom-end">
            <ui:dropdown.trigger icon="ellipsis" arrow="" variant="ghost" size="sm" class="size-8 rounded-md" />
            <ui:dropdown.menu>
                {{ $moreSlot }}
            </ui:dropdown.menu>
        </ui:dropdown>
    @endif
</div>
