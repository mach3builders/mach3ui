@php
    $classes = Ui::classes()
        ->add('relative inline-flex items-center gap-1')
        // Default variant: bottom border
        ->add('[[data-variant=default]_&]:border-b [[data-variant=default]_&]:border-gray-60 [[data-variant=default]_&]:dark:border-gray-740')
        // Boxed variant: pill/segment style
        ->add('[[data-variant=boxed]_&]:rounded-lg [[data-variant=boxed]_&]:border [[data-variant=boxed]_&]:border-gray-60 [[data-variant=boxed]_&]:bg-gray-30 [[data-variant=boxed]_&]:p-1')
        ->add('[[data-variant=boxed]_&]:dark:border-gray-770 [[data-variant=boxed]_&]:dark:bg-gray-820')
        ->merge($attributes);
@endphp

<div role="tablist" {{ $attributes->except('class') }} class="{{ $classes }}" data-tabs-list>
    {{ $slot }}
</div>
