@props([
    'active' => false,
    'badge' => null,
    'description' => null,
    'flush' => false,
    'horizontal' => false,
    'icon' => null,
    'icon:boxed' => false,
    'icon:color' => 'gray',
    'icon:size' => 'md',
    'image' => null,
    'imageOverlay' => false,
    'imagePosition' => 'top',
    'title' => null,
    'variant' => null,
])

@php
    $icon_boxed = $__data['icon:boxed'] ?? false;
    $icon_color = $__data['icon:color'] ?? 'gray';
    $icon_size = $__data['icon:size'] ?? 'md';

    $action_slot = $__laravel_slots['action'] ?? null;
    $image_slot = $__laravel_slots['image'] ?? null;
    $has_image = $image_slot || $image;
    $image_first = in_array($imagePosition, ['top', 'left']);
    $is_horizontal = $horizontal || in_array($imagePosition, ['left', 'right']);
    $show_overlay = $imageOverlay && $has_image && $title;
@endphp

<div {{ $attributes->class([
    'rounded-xl p-1.5',
    'bg-gray-30 dark:bg-gray-830' => $variant !== 'inverted',
    'bg-white shadow-xs dark:bg-gray-800' => $variant === 'inverted',
    'ring-2 ring-blue-600 dark:ring-blue-500' => $active,
    'flex flex-row' => $is_horizontal,
]) }}
    data-card data-variant="{{ $variant }}">
    @if ($has_image && $image_first)
        @if ($image_slot)
            <div
                {{ $image_slot->attributes->class([
                    'relative overflow-hidden rounded-lg',
                    'w-1/3 shrink-0 [&>img]:h-full' => $is_horizontal,
                ]) }}>
                {{ $image_slot }}
            </div>
        @else
            <div @class([
                'relative overflow-hidden rounded-lg',
                'w-1/3 shrink-0 [&>img]:h-full' => $is_horizontal,
            ])>
                <img src="{{ $image }}" alt="" class="w-full object-cover" />

                @if ($show_overlay)
                    <div class="absolute inset-0 flex items-end bg-linear-to-t from-black/80 to-transparent p-4">
                        <ui:card.title class="text-white">{{ $title }}</ui:card.title>
                    </div>
                @endif
            </div>
        @endif
    @endif

    @php
        $icon_slot = $__laravel_slots['icon'] ?? null;
        $has_icon = $icon_slot || $icon;
        $show_header = isset($header) || ($title && !$show_overlay) || ($description && $show_overlay) || $has_icon;
        $show_footer = isset($footer);
    @endphp

    <div class="flex flex-1 flex-col h-full">
        @if ($show_header)
            @if ($action_slot && !isset($header))
                <div @class([
                    'relative flex gap-3 px-4.5 pb-5',
                    'pt-4' => $has_image && $image_first,
                    'pt-5' => !$has_image || !$image_first,
                ])>
                    @if ($has_icon)
                        <div class="shrink-0">
                            @if ($icon_slot)
                                {{ $icon_slot }}
                            @else
                                <ui:icon :name="$icon" :boxed="$icon_boxed" :color="$icon_color"
                                    :size="$icon_size" />
                            @endif
                        </div>
                    @endif

                    <div @class([
                        'flex flex-1 flex-col gap-1.5',
                        'justify-center' => !$description,
                    ])>
                        <div class="flex items-center gap-2">
                            @if ($title && !$show_overlay)
                                <ui:card.title>{{ $title }}</ui:card.title>
                            @endif

                            @if ($badge)
                                <ui:badge>{{ $badge }}</ui:badge>
                            @endif
                        </div>

                        @if ($description)
                            <ui:card.description>{{ $description }}</ui:card.description>
                        @endif
                    </div>

                    <div class="absolute right-3 top-4">
                        {{ $action_slot }}
                    </div>
                </div>
            @else
                <ui:card.header :pad-top="!$has_image || !$image_first" :icon="$icon" :icon:slot="$icon_slot"
                    :icon:boxed="$icon_boxed" :icon:color="$icon_color" :icon:size="$icon_size"
                    :has-description="(bool) $description"
                    :attributes="isset($header) ? $header->attributes : new \Illuminate\View\ComponentAttributeBag([])">
                    @if (isset($header))
                        {{ $header }}
                    @elseif ($title && !$show_overlay)
                        @if ($badge)
                            <div class="flex items-center justify-between">
                                <ui:card.title>{{ $title }}</ui:card.title>

                                <ui:badge>{{ $badge }}</ui:badge>
                            </div>
                        @else
                            <ui:card.title>{{ $title }}</ui:card.title>
                        @endif

                        @if ($description)
                            <ui:card.description>{{ $description }}</ui:card.description>
                        @endif
                    @elseif ($has_icon && !$title && !$description)
                        {{-- Icon only, no content needed --}}
                    @else
                        <ui:card.description>{{ $description }}</ui:card.description>
                    @endif
                </ui:card.header>
            @endif
        @endif

        @if ($slot->isNotEmpty())
            <ui:card.content :variant="$variant" :flush="$flush">
                {{ $slot }}
            </ui:card.content>
        @endif

        @if ($show_footer)
            <ui:card.footer :variant="$variant" :attributes="$footer->attributes">
                {{ $footer }}
            </ui:card.footer>
        @endif
    </div>

    @if ($has_image && !$image_first)
        @if ($image_slot)
            <div
                {{ $image_slot->attributes->class([
                    'relative overflow-hidden rounded-lg',
                    'w-1/3 shrink-0 [&>img]:h-full' => $is_horizontal,
                ]) }}>
                {{ $image_slot }}
            </div>
        @else
            <div @class([
                'relative overflow-hidden rounded-lg',
                'w-1/3 shrink-0 [&>img]:h-full' => $is_horizontal,
            ])>
                <img src="{{ $image }}" alt="" class="w-full object-cover" />
            </div>
        @endif
    @endif
</div>
