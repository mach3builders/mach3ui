@props([
    'title' => null,
    'description' => null,
    'variant' => null,
])

@php
    $is_stacked = $variant === 'stacked';
    $is_inline = $variant === 'inline';

    $wrapper_classes = [
        'flex gap-3',
        'flex-col' => !$is_inline,
        'flex-row items-start gap-8' => $is_inline,
        '@xl:flex-row @xl:items-start @xl:gap-8' => !$is_stacked && !$is_inline,
    ];

    $header_classes = [
        'flex flex-col gap-1',
        'px-4' => !$is_inline,
        'w-56 shrink-0 pt-4' => $is_inline,
        '@xl:w-56 @xl:shrink-0 @xl:px-0 @xl:pt-4' => !$is_stacked && !$is_inline,
    ];
@endphp

<div {{ $attributes->class(['@container', '[[data-section]+&]:mt-8']) }} data-section>
    <div @class($wrapper_classes)>
        @if ($title || $description || isset($header))
            <div @class($header_classes)>
                @if (isset($header))
                    {{ $header }}
                @else
                    @if ($title)
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
                    @endif

                    @if ($description)
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</p>
                    @endif
                @endif
            </div>
        @endif

        <ui:box variant="subtle" class="flex grow flex-col">
            {{ $slot }}
        </ui:box>
    </div>
</div>
