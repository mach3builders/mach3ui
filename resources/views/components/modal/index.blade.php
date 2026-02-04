@props([
    'closeable' => true,
    'name' => null,
    'size' => 'md',
])

@php
    $wireModel = method_exists($attributes, 'wire') ? $attributes->wire('model') : null;
    $hasWireModel = $wireModel && method_exists($wireModel, 'value') && $wireModel->value();
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;
    $isLive = $hasWireModel && $wireModel->hasModifier('live');

    $openState = $hasWireModel ? "\$wire.entangle('{$wireModelValue}')" . ($isLive ? '.live' : '') : 'false';

    $modalId = $name ?? uniqid('modal-');

    $panelClasses = Ui::classes()
        ->add('fixed inset-0 m-auto flex max-h-[90vh] w-full flex-col rounded-xl border shadow-2xl')
        ->add('border-transparent bg-white dark:border-gray-700 dark:bg-gray-800')
        ->add('opacity-0 pointer-events-none transition-all duration-200 ease-out')
        ->add('open:opacity-100 open:pointer-events-auto')
        ->add('backdrop:bg-gray-900/50 backdrop:backdrop-blur-sm backdrop:opacity-0 backdrop:pointer-events-none backdrop:transition-all backdrop:duration-200 backdrop:ease-out')
        ->add('open:backdrop:opacity-100 open:backdrop:pointer-events-auto')
        ->add('dark:backdrop:bg-black/70')
        ->add($size, [
            'sm' => 'max-w-sm',
            'md' => 'max-w-lg',
            'lg' => 'max-w-2xl',
            'xl' => 'max-w-4xl',
            'full' => 'max-w-full mx-4',
        ])
        ->merge($attributes);
@endphp

<dialog
    id="{{ $modalId }}"
    wire:ignore.self
    x-modelable="open"
    x-data="{
        open: {{ $openState }},
        init() {
            const id = this.$el.id;

            this.$el.addEventListener('toggle', e => this.open = e.newState === 'open');

            window.addEventListener('modal-open', e => e.detail === id && this.openModal());
            window.addEventListener('modal-close', e => e.detail === id && this.closeModal());

            window.$openModal ??= id => window.dispatchEvent(new CustomEvent('modal-open', { detail: id }));
            window.$closeModal ??= id => window.dispatchEvent(new CustomEvent('modal-close', { detail: id }));

            this.$watch('open', value => value ? this.$el.showModal() : this.$el.close());

            if (this.open) this.$el.showModal();
        },
        openModal() {
            document.querySelectorAll('[popover]:popover-open').forEach(p => p.hidePopover());
            this.open = true;
        },
        closeModal() {
            this.open = false;
        }
    }"
    @if($name)
        x-on:open-modal-{{ $name }}.window="openModal()"
        x-on:close-modal-{{ $name }}.window="closeModal()"
    @endif
    x-on:keydown.escape.prevent="closeModal()"
    @if($closeable)
        x-on:click.self="closeModal()"
    @endif
    role="dialog"
    aria-modal="true"
    @if(isset($title))
        aria-labelledby="{{ $modalId }}-title"
    @endif
    data-modal
    {{ $attributes->except('class')->whereDoesntStartWith('wire:model') }}
    class="{{ $panelClasses }}"
>
    {{ $slot }}
</dialog>
