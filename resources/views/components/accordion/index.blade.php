@props([
    'multiple' => false,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add($variant, [
            'default' => 'divide-y divide-gray-100 dark:divide-gray-700',
            'bordered' =>
                'group divide-y divide-gray-100 rounded-lg bg-gray-20 dark:bg-gray-820 border border-gray-100 dark:divide-gray-700 dark:border-gray-700',
            'separated' => 'group space-y-2',
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
