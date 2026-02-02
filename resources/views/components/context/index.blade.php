@props([])

@php
    $id = uniqid('context-');
    $classes = Ui::classes()->add('contents')->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} x-data="{
    id: '{{ $id }}',
    isOpen: false,
    x: 0,
    y: 0,
    open(event) {
        if (this.$refs.menu.contains(event.target)) {
            this.close();
            return;
        }

        const menu = this.$refs.menu;
        const viewportWidth = window.innerWidth;
        const viewportHeight = window.innerHeight;

        let posX = event.clientX;
        let posY = event.clientY;

        menu.style.visibility = 'hidden';
        menu.showPopover();

        const menuWidth = menu.offsetWidth;
        const menuHeight = menu.offsetHeight;

        if (posX + menuWidth > viewportWidth) {
            posX = viewportWidth - menuWidth - 8;
        }
        if (posY + menuHeight > viewportHeight) {
            posY = viewportHeight - menuHeight - 8;
        }

        this.x = Math.max(8, posX);
        this.y = Math.max(8, posY);

        menu.style.visibility = 'visible';
        this.isOpen = true;
    },
    close() {
        this.$refs.menu.hidePopover();
        this.isOpen = false;
    }
}"
    x-on:contextmenu.prevent="open($event)" x-on:contextmenu.window="if (isOpen && !$el.contains($event.target)) close()"
    x-on:click.window="if (isOpen && !$refs.menu.contains($event.target)) close()" x-on:keydown.escape.window="close()"
    x-on:context-close="close()" data-context>
    {{ $slot }}
</div>
