@props([
    'closeable' => false,
    'description' => null,
    'size' => 'md',
    'title' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = (bool) $wireModel?->directive;
    $wireModelValue = $wireModel?->value();
    $isLive = $wireModel?->hasModifier('live');

    $headerSlot = $__laravel_slots['header'] ?? null;
    $alertSlot = $__laravel_slots['alert'] ?? null;
    $footerSlot = $__laravel_slots['footer'] ?? null;

    $classes = Ui::classes()
        ->add('fixed inset-0 m-auto flex max-h-[90vh] w-full flex-col rounded-xl border shadow-2xl')
        ->add('border-transparent bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-800')
        ->add('opacity-0 pointer-events-none transition-all duration-200 ease-out')
        ->add('open:opacity-100 open:pointer-events-auto')
        ->add(
            'backdrop:bg-gray-900/50 backdrop:backdrop-blur-xs backdrop:opacity-0 backdrop:pointer-events-none backdrop:transition-all backdrop:duration-200 backdrop:ease-out',
        )
        ->add('open:backdrop:opacity-100 open:backdrop:pointer-events-auto')
        ->add('dark:backdrop:bg-black/70')
        ->add(
            match ($size) {
                'sm' => 'max-w-md',
                'lg' => 'max-w-2xl',
                'xl' => 'max-w-4xl',
                'full' => 'max-w-full mx-4',
                default => 'max-w-lg',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<dialog class="{{ $classes }}" {{ $attributes->except('class')->whereDoesntStartWith('wire:model') }}
    x-data="{
        open: {{ $hasWireModel ? "(typeof \$wire !== 'undefined' ? \$wire.entangle('{$wireModelValue}')" . ($isLive ? '.live' : '') . ' : false)' : 'false' }},
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
            @if($hasWireModel)
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
    }" @if ($closeable)
    x-on:click="if ($event.target === $el) closeModal()"
    @endif
    x-on:keydown.escape.prevent="closeModal()"
    data-modal
    >
    @if ($title || $headerSlot)
        <ui:modal.header>
            @if ($headerSlot)
                {{ $headerSlot }}
            @else
                <div>
                    <ui:modal.title>{{ $title }}</ui:modal.title>

                    @if ($description)
                        <ui:modal.description>{{ $description }}</ui:modal.description>
                    @endif
                </div>
            @endif

            <ui:button variant="ghost" size="sm" icon="x" class="absolute top-4 right-4"
                x-on:click="closeModal()" />
        </ui:modal.header>
    @endif

    @if ($alertSlot)
        <div class="px-6">
            {{ $alertSlot }}
        </div>
    @endif

    @if ($slot->isNotEmpty())
        <ui:modal.body>
            {{ $slot }}
        </ui:modal.body>
    @endif

    @if ($footerSlot)
        <ui:modal.footer>
            {{ $footerSlot }}
        </ui:modal.footer>
    @endif
</dialog>
