@props([
    'closeable' => false,
    'description' => null,
    'size' => 'md',
    'title' => null,
])

@php
    $size_classes = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'full' => 'max-w-full mx-4',
    ];

    $size_class = $size_classes[$size] ?? $size_classes['md'];
    $wire_model = $attributes->get('wire:model.live') ?? $attributes->get('wire:model');
    $wire_model_live = $attributes->has('wire:model.live');
@endphp

<dialog
    {{ $attributes->class([
        'fixed inset-0 m-auto flex max-h-[90vh] w-full flex-col rounded-xl border shadow-2xl',
        'border-transparent bg-white',
        'dark:border-gray-740 dark:bg-gray-800',
        'opacity-0 pointer-events-none transition-all duration-200 ease-out',
        'open:opacity-100 open:pointer-events-auto',
        'backdrop:bg-gray-900/50 backdrop:backdrop-blur-xs backdrop:opacity-0 backdrop:pointer-events-none backdrop:transition-all backdrop:duration-200 backdrop:ease-out',
        'open:backdrop:opacity-100 open:backdrop:pointer-events-auto',
        'dark:backdrop:bg-black/70',
        $size_class,
    ])->except(['wire:model', 'wire:model.live']) }}
    x-data="{
        open: {{ $wire_model ? "(typeof \$wire !== 'undefined' ? \$wire.entangle('{$wire_model}')" . ($wire_model_live ? ".live" : "") . " : false)" : 'false' }},
        dialog: null,
        init() {
            this.dialog = this.$el;
            const id = this.$el.id;
            window.addEventListener('modal-open', (e) => {
                if (e.detail === id) this.openModal();
            });
            window.addEventListener('modal-close', (e) => {
                if (e.detail === id) this.closeModal();
            });
            if (!window.$openModal) {
                window.$openModal = (id) => window.dispatchEvent(new CustomEvent('modal-open', { detail: id }));
                window.$closeModal = (id) => window.dispatchEvent(new CustomEvent('modal-close', { detail: id }));
            }
            @if ($wire_model)
                if (typeof $wire !== 'undefined') {
                    this.$watch('open', (value) => {
                        value ? this.dialog.showModal() : this.dialog.close();
                    });
                    if (this.open) this.dialog.showModal();
                }
            @endif
        },
        openModal() {
            document.querySelectorAll('[popover]:popover-open').forEach(p => p.hidePopover());
            this.open = true;
            this.dialog.showModal();
        },
        closeModal() {
            this.open = false;
            this.dialog.close();
        }
    }"
    @if ($closeable)
        x-on:click="if ($event.target === $el) closeModal()"
    @endif
    x-on:keydown.escape.prevent="closeModal()"
    data-modal
>
    @if ($title || isset($header))
        <ui:modal.header>
            @if (isset($header))
                {{ $header }}
            @else
                <div>
                    <ui:modal.title>{{ $title }}</ui:modal.title>

                    @if ($description)
                        <ui:modal.description>{{ $description }}</ui:modal.description>
                    @endif
                </div>
            @endif

            <ui:button variant="ghost" size="sm" icon="x" class="absolute top-4 right-4" x-on:click="closeModal()" />
        </ui:modal.header>
    @endif

    @if (isset($alert))
        <div class="px-6">
            {{ $alert }}
        </div>
    @endif

    @if ($slot->isNotEmpty())
        <ui:modal.body>
            {{ $slot }}
        </ui:modal.body>
    @endif

    @if (isset($footer))
        <ui:modal.footer>
            {{ $footer }}
        </ui:modal.footer>
    @endif
</dialog>
