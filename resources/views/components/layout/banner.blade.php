@props([
    'name' => null,
    'switchUrl' => '#',
])

<div
    {{ $attributes
        ->when(!$name, fn ($a) => $a->merge(['class' => 'hidden']))
        ->class([
            'sticky top-0 z-50 flex h-10 items-center justify-center gap-4 px-4',
            'text-gray-20 bg-gray-800',
            'dark:bg-white dark:text-gray-800',
        ])
    }}
    data-layout-banner
>
    <div class="flex items-center gap-2">
        <div class="flex items-center gap-2 font-medium">
            <ui:icon name="glasses" class="size-4" />

            <span>You are logged in as <strong>{{ $name }}</strong></span>
        </div>

        <ui:tooltip text="Switch to own account" position="bottom">
            <ui:button variant="ghost" size="sm" icon="log-out" :href="$switchUrl" class="text-gray-100! dark:text-gray-980!" />
        </ui:tooltip>
    </div>
</div>
