@props([
    'count' => null,
    'countLabel' => 'selected',
])

<div {{ $attributes->class([
    'inline-flex h-10 items-center gap-1 rounded-lg border p-1',
    'border-gray-100 bg-gray-20',
    'dark:border-gray-700 dark:bg-gray-820',
]) }}
    x-data="{ count: @js($count) }" data-action-bar>
    <template x-if="count !== null">
        <span class="flex items-center gap-1.5 px-2.5 py-1.5 text-xs font-medium" data-action-bar-count>
            <span class="tabular-nums" x-text="count"></span>

            <span>{{ $countLabel }}</span>
        </span>
    </template>

    <template x-if="count !== null">
        <ui:divider orientation="vertical" variant="subtle" />
    </template>

    <div class="flex items-center gap-1" data-action-bar-actions>
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
