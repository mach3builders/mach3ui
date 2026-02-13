@php
    $classes = Ui::classes()
        ->add('[[data-field]+&]:mt-6 [[data-field]+&]:justify-end')
        ->add('[[data-fields]+&]:mt-6 [[data-fields]+&]:justify-end')
        ->add('@container flex flex-col gap-2 [&>[data-button]]:w-full')
        ->add('@sm:flex-row @sm:items-center @sm:[&>[data-button]]:w-auto')
        // Form section: grid gap handles spacing, buttons align to 2nd column
        ->add('[[data-variant=form]_[data-field]+&]:mt-0')
        ->add('[[data-variant=form]_[data-fields]+&]:mt-0')
        ->add('@3xl:[[data-variant=form]_&]:col-start-2')
        ->merge($attributes);
@endphp

<div data-buttons {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
