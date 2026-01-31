@props([
    'title' => null,
    'description' => null,
    'variant' => null,
])

@php
    $isStacked = $variant === 'stacked';
    $isInline = $variant === 'inline';

    $classes = Ui::classes()->add('@container [[data-section]+&]:mt-8');

    $wrapperClasses = Ui::classes()
        ->add('flex gap-3')
        ->unless($isInline, 'flex-col')
        ->when($isInline, 'flex-row items-start gap-8')
        ->when(!$isStacked && !$isInline, '@xl:flex-row @xl:items-start @xl:gap-8');

    $headerClasses = Ui::classes()
        ->add('flex flex-col gap-1')
        ->unless($isInline, 'px-4')
        ->when($isInline, 'w-56 shrink-0 pt-4')
        ->when(!$isStacked && !$isInline, '@xl:w-56 @xl:shrink-0 @xl:px-0 @xl:pt-4');
@endphp

<div {{ $attributes->class($classes) }} data-section>
    <div class="{{ $wrapperClasses }}">
        @if ($title || $description || isset($header))
            <div class="{{ $headerClasses }}">
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
