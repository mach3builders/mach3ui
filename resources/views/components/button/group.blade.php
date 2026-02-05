@blaze

@props([
    'attached' => true,
])

@php
    $classes = Ui::classes()
        ->add('inline-flex')
        ->add('[&>*:focus]:z-10 [&>*:focus-visible]:z-10')
        ->when(
            $attached,
            '[&>*]:rounded-none [&>*:first-child]:rounded-l-md [&>*:last-child]:rounded-r-md [&>*:not(:first-child)]:-ml-px',
        )
        ->when(!$attached, 'gap-2')
        ->merge($attributes);
@endphp

<div data-button-group {{ $attributes->except('class') }} class="{{ $classes }}">
    {{ $slot }}
</div>
