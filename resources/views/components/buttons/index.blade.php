@php
    $classes = Ui::classes()
        ->add('[[data-field]+&]:mt-6 [[data-field]+&]:justify-end')
        ->add('[[data-fields]+&]:mt-6 [[data-fields]+&]:justify-end')
        ->add('@container flex flex-col gap-2 [&>[data-button]]:w-full')
        ->add('@sm:flex-row @sm:items-center @sm:[&>[data-button]]:w-auto')
        ->merge($attributes);
@endphp

<div data-buttons {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
