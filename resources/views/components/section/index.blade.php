@props([
    'description' => null,
    'title' => null,
    'variant' => null,
])

@php
    $headerSlot = $__laravel_slots['header'] ?? null;

    $isInline = $variant === 'inline';
    $isStacked = $variant === 'stacked';
    $isResponsive = !$isInline && !$isStacked;

    $classes = Ui::classes()->add('@container [[data-section]+&]:mt-8')->merge($attributes->only('class'));

    $wrapperClasses = Ui::classes()
        ->add('flex gap-3')
        ->add($isInline ? 'flex-row items-start gap-8' : 'flex-col')
        ->when($isResponsive, '@xl:flex-row @xl:items-start @xl:gap-8');

    $headerClasses = Ui::classes()
        ->add('flex flex-col gap-1')
        ->add($isInline ? 'w-56 shrink-0 pt-4' : 'px-4')
        ->when($isResponsive, '@xl:w-56 @xl:shrink-0 @xl:px-0 @xl:pt-4');

    $titleClasses = Ui::classes()->add('text-base font-semibold text-gray-900')->add('dark:text-white');

    $descriptionClasses = Ui::classes()->add('text-sm text-gray-500')->add('dark:text-gray-400');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-section>
    <div class="{{ $wrapperClasses }}" data-section-wrapper>
        @if ($title || $description || $headerSlot)
            <div class="{{ $headerClasses }}" data-section-header>
                @if ($headerSlot)
                    {{ $headerSlot }}
                @else
                    @if ($title)
                        <h3 class="{{ $titleClasses }}" data-section-title>{{ $title }}</h3>
                    @endif

                    @if ($description)
                        <p class="{{ $descriptionClasses }}" data-section-description>{{ $description }}</p>
                    @endif
                @endif
            </div>
        @endif

        <ui:box variant="subtle" class="flex grow flex-col" data-section-content>
            {{ $slot }}
        </ui:box>
    </div>
</div>
