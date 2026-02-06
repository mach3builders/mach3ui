@blaze

@aware(['variant' => 'default'])

@props([
    'divided' => false,
])

@php
    $isSimple = $variant === 'simple';

    $classes = Ui::classes()
        ->add('relative z-0')
        ->unless($isSimple, 'rounded-b-lg border border-t-0 shadow-xs')
        ->add($variant, [
            'default' => 'border-gray-60 bg-white dark:border-gray-760 dark:bg-gray-800',
            'inverted' => 'border-gray-80 bg-gray-30 dark:border-gray-700 dark:bg-gray-820',
        ])
        ->merge($attributes);

    $innerClasses = Ui::classes()
        ->add('flex items-center gap-2')
        ->unless($isSimple, 'px-4.5 py-4');
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card-footer>
    @if ($divided)
        <ui:divider class="bg-gray-60 dark:bg-gray-740" />
    @endif

    <div class="{{ $innerClasses }}">
        {{ $slot }}
    </div>
</div>
