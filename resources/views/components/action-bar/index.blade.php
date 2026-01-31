@props([
    'count' => null,
    'countLabel' => 'selected',
])

@php
    $classes = Ui::classes()
        ->add('inline-flex h-10 items-center gap-1 rounded-lg border p-1')
        ->add('border-gray-100 bg-gray-20')
        ->add('dark:border-gray-700 dark:bg-gray-820')
        ->merge($attributes->only('class'));

    $countClasses = Ui::classes()->add('flex items-center gap-1.5 px-2.5 py-1.5 text-xs font-medium');
    $actionsClasses = Ui::classes()->add('flex items-center gap-1');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} x-data="{ count: @js($count) }" data-action-bar>
    <template x-if="count !== null">
        <span class="{{ $countClasses }}" data-action-bar-count>
            <span x-text="count"></span>
            <span>{{ $countLabel }}</span>
        </span>
    </template>

    <template x-if="count !== null">
        <ui:divider orientation="vertical" variant="subtle" />
    </template>

    <div class="{{ $actionsClasses }}" data-action-bar-actions>
        {{ $slot }}
    </div>

    @if (isset($more) && $more->isNotEmpty())
        <ui:divider orientation="vertical" variant="subtle" class="my-1" />

        <ui:dropdown position="bottom-end">
            <ui:dropdown.trigger icon="ellipsis" arrow="" variant="ghost" size="sm"
                class="size-8 rounded-md" />
            <ui:dropdown.menu>
                {{ $more }}
            </ui:dropdown.menu>
        </ui:dropdown>
    @endif
</div>
