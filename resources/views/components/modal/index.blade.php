@props([
    'closeable' => false,
    'description' => null,
    'size' => 'md',
    'title' => null,
])

@php
    $wireModel = $attributes->wire('model');
    $hasWireModel = $wireModel && method_exists($wireModel, 'value');
    $wireModelValue = $hasWireModel ? $wireModel->value() : null;
    $isLive = $hasWireModel && $wireModel->hasModifier('live');

    $openState = $hasWireModel ? "\$wire.entangle('{$wireModelValue}')" . ($isLive ? '.live' : '') : 'false';

    $headerSlot = $__laravel_slots['header'] ?? null;
    $alertSlot = $__laravel_slots['alert'] ?? null;
    $footerSlot = $__laravel_slots['footer'] ?? null;

    $sizeClasses = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'full' => 'max-w-full mx-4',
    ];

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
        ->add($sizeClasses[$size] ?? $size)
        ->merge($attributes->only('class'));
@endphp

<dialog class="{{ $classes }}" {{ $attributes->except('class')->whereDoesntStartWith('wire:model') }}
    wire:ignore.self x-modelable="open" x-data="{
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
    }" x-on:keydown.escape.prevent="closeModal()" @if ($closeable)
    x-on:click.self="closeModal()"
    @endif
    data-modal>
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
