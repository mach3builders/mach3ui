@props([])

@php
    $id = 'context-' . uniqid();
@endphp

<div
    {{ $attributes->class(['contents']) }}
    x-data="{
        id: '{{ $id }}',
        x: 0,
        y: 0,
        isOpen: false,
        open(event) {
            if (this.$refs.menu.contains(event.target)) {
                this.close();
                return;
            }
            this.x = event.clientX;
            this.y = event.clientY;
            this.$refs.menu.showPopover();
            this.isOpen = true;
        },
        close() {
            this.$refs.menu.hidePopover();
            this.isOpen = false;
        }
    }"
    @contextmenu.prevent="open($event)"
    @contextmenu.window="if (isOpen && !$el.contains($event.target)) close()"
    @click.window="if (isOpen && !$refs.menu.contains($event.target)) close()"
    @keydown.escape.window="close()"
    data-context
>
    {{ $slot }}
</div>
