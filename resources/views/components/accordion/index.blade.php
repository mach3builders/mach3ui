@props([
    'multiple' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('divide-y')
        ->add($variant, [
            'default' => 'divide-gray-200 dark:divide-gray-700',
            'bordered' =>
                'group divide-gray-200 rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700',
            'separated' => 'divide-transparent space-y-2',
        ])
        ->merge($attributes);
@endphp

<div x-data="{
    active: {{ $multiple ? '[]' : 'null' }},
    toggle(name) {
        @if ($multiple) this.active.includes(name)
                    ? this.active = this.active.filter(i => i !== name)
                    : this.active.push(name)
            @else
                this.active = this.active === name ? null : name @endif
    },
    isOpen(name) {
        return {{ $multiple ? 'this.active.includes(name)' : 'this.active === name' }}
    }
}" data-accordion data-variant="{{ $variant }}" {{ $attributes->except('class') }}
    class="{{ $classes }}">
    {{ $slot }}
</div>
