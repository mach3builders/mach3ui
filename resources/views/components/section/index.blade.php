@props([
    'description' => null,
    'title' => null,
    'variant' => null,
])

@php
    $headerSlot = $__laravel_slots['header'] ?? null;

    $isStacked = $variant === 'stacked';
    $isInline = $variant === 'inline';

    $classes = Ui::classes()->add('@container [[data-section]+&]:mt-8')->merge($attributes->only('class'));

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

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-section>
    <div class="{{ $wrapperClasses }}">
        @if ($title || $description || $headerSlot)
            <div class="{{ $headerClasses }}">
                @if ($headerSlot)
                    {{ $headerSlot }}
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
