@props([
    'icon' => 'chevron-down',
    'open' => false,
    'title',
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('group')
        ->add($variant, [
            'default' => '',
            'bordered' => 'rounded-lg border border-gray-200 dark:border-gray-700',
            'filled' => 'rounded-lg bg-gray-50 dark:bg-gray-800/50',
        ])
        ->merge($attributes);

    $summaryClasses = Ui::classes()
        ->add('flex cursor-pointer list-none items-center justify-between gap-3 font-medium')
        ->add('text-gray-900 transition-colors hover:text-gray-700 dark:text-gray-100 dark:hover:text-white')
        ->add('focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:focus-visible:ring-offset-gray-900')
        ->add($variant, [
            'default' => 'py-4',
            'bordered' => 'px-4 py-4',
            'filled' => 'px-4 py-4',
        ])
        ->add('[&::-webkit-details-marker]:hidden')
        ->add('[[data-details-group][data-variant=bordered]_&]:px-4');

    $iconClasses = Ui::classes()
        ->add('size-4 shrink-0 text-gray-400 transition-transform duration-200 dark:text-gray-500')
        ->add('group-open:rotate-180');

    $contentClasses = Ui::classes()
        ->add('text-gray-600 dark:text-gray-400')
        ->add($variant, [
            'default' => 'pb-4',
            'bordered' => 'px-4 pb-4',
            'filled' => 'px-4 pb-4',
        ])
        ->add('[[data-details-group][data-variant=bordered]_&]:px-4');
@endphp

<details @if($open) open @endif data-details data-variant="{{ $variant }}" {{ $attributes->except('class') }} class="{{ $classes }}">
    <summary class="{{ $summaryClasses }}">
        <span>{{ $title }}</span>
        <ui:icon :name="$icon" class="{{ $iconClasses }}" />
    </summary>

    <div class="{{ $contentClasses }}">
        {{ $slot }}
    </div>
</details>
