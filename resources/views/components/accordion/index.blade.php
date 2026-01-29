@props([
    'default' => null,
    'type' => 'multiple',
])

<div
    {{ $attributes->class(['flex flex-col select-none']) }}
    @if ($type === 'single')
        x-data="{
            active: @js($default),
            toggle(value) {
                this.active = this.active === value ? null : value;
            }
        }"
        data-accordion-type="single"
    @endif
    data-accordion
>
    {{ $slot }}
</div>
