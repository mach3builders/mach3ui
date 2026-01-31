@props([])

@php
    $classes = Ui::classes()
        ->add('relative flex min-h-6 items-center gap-2 text-xs md:gap-3')
        ->merge($attributes->only('class'));
@endphp

<nav x-data="{
    items: [],
    register(url) {
        this.items.push(url);
    },
    get parentUrl() {
        return this.items.length > 1 ? this.items[this.items.length - 2] : null;
    },
}" class="{{ $classes }}" {{ $attributes->except('class') }} data-breadcrumbs>
    <ui:button x-show="parentUrl" x-cloak ::href="parentUrl" variant="subtle" size="xs" icon="chevron-left"
        class="md:hidden" />

    {{ $slot }}
</nav>
