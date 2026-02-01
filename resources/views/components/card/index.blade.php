@props([
    'badge' => null,
    'description' => null,
    'flush' => false,
    'icon' => null,
    'icon:boxed' => false,
    'icon:color' => 'gray',
    'icon:size' => 'md',
    'image' => null,
    'image:overlay' => false,
    'image:position' => 'top',
    'title' => null,
    'variant' => null,
])

@php
    $iconBoxed = $__data['icon:boxed'] ?? false;
    $iconColor = $__data['icon:color'] ?? 'gray';
    $iconSize = $__data['icon:size'] ?? 'md';
    $imageOverlay = $__data['image:overlay'] ?? false;
    $imagePosition = $__data['image:position'] ?? 'top';

    $actionSlot = $__laravel_slots['action'] ?? null;
    $imageSlot = $__laravel_slots['image'] ?? null;
    $iconSlot = $__laravel_slots['icon'] ?? null;

    $hasImage = $imageSlot || $image;
    $imageFirst = in_array($imagePosition, ['top', 'left']);
    $isHorizontal = in_array($imagePosition, ['left', 'right']);
    $showOverlay = $imageOverlay && $hasImage && $title;
    $hasIcon = $iconSlot || $icon;
    $showHeader = isset($header) || ($title && !$showOverlay) || ($description && $showOverlay) || $hasIcon;
    $showFooter = isset($footer);

    $classes = Ui::classes()
        ->add('rounded-xl p-1.5')
        ->add(
            match ($variant) {
                'inverted' => 'bg-white shadow-xs dark:bg-gray-800',
                default => 'bg-gray-30 dark:bg-gray-830',
            },
        )
        ->when($isHorizontal, 'flex flex-row')
        ->merge($attributes->only('class'));

    $actionHeaderClasses = Ui::classes()
        ->add('relative flex gap-3 px-4.5 pb-5')
        ->add($hasImage && $imageFirst ? 'pt-4' : 'pt-5');

    $actionContentClasses = Ui::classes()->add('flex flex-1 flex-col gap-1.5')->unless($description, 'justify-center');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-card data-variant="{{ $variant }}">
    @if ($hasImage && $imageFirst)
        @include('ui::components.card._image', [
            'image' => $image,
            'imageSlot' => $imageSlot,
            'isHorizontal' => $isHorizontal,
            'showOverlay' => $showOverlay,
            'title' => $title,
        ])
    @endif

    <div class="flex h-full flex-1 flex-col">
        @if ($showHeader)
            @if ($actionSlot && !isset($header))
                <div class="{{ $actionHeaderClasses }}" data-card-header>
                    @if ($hasIcon)
                        <div class="shrink-0">
                            @if ($iconSlot)
                                {{ $iconSlot }}
                            @else
                                <ui:icon :name="$icon" :boxed="$iconBoxed" :color="$iconColor"
                                    :size="$iconSize" />
                            @endif
                        </div>
                    @endif

                    <div class="{{ $actionContentClasses }}">
                        <div class="flex items-center gap-2">
                            @if ($title && !$showOverlay)
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
                        {{ $actionSlot }}
                    </div>
                </div>
            @else
                <ui:card.header :pad-top="!$hasImage || !$imageFirst" :icon="$icon" :icon:slot="$iconSlot"
                    :icon:boxed="$iconBoxed" :icon:color="$iconColor" :icon:size="$iconSize"
                    :has-description="(bool) $description"
                    :attributes="isset($header) ? $header->attributes : new \Illuminate\View\ComponentAttributeBag([])">
                    @if (isset($header))
                        {{ $header }}
                    @elseif ($title && !$showOverlay)
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
                    @elseif ($hasIcon && !$title && !$description)
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

        @if ($showFooter)
            <ui:card.footer :variant="$variant" :attributes="$footer->attributes">
                {{ $footer }}
            </ui:card.footer>
        @endif
    </div>

    @if ($hasImage && !$imageFirst)
        @include('ui::components.card._image', [
            'image' => $image,
            'imageSlot' => $imageSlot,
            'isHorizontal' => $isHorizontal,
            'showOverlay' => false,
            'title' => null,
        ])
    @endif
</div>
