@props([
    'duration' => 5000,
    'position' => 'bottom-right',
])

@php
    $classes = Ui::classes()
        ->add('fixed z-[9999] flex flex-col gap-3 pointer-events-none')
        ->add($position, [
            'top-left' => 'top-4 left-4 items-start',
            'top-right' => 'top-4 right-4 items-end',
            'top-center' => 'top-4 left-1/2 -translate-x-1/2 items-center',
            'bottom-left' => 'bottom-4 left-4 items-start',
            'bottom-right' => 'bottom-4 right-4 items-end',
            'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2 items-center',
        ])
        ->merge($attributes);

    $variantClasses = [
        'default' => 'border-gray-100 bg-gray-20/90 dark:border-gray-700 dark:bg-gray-780/90',
        'info' => 'border-cyan-200 bg-cyan-50/90 dark:border-cyan-800/50 dark:bg-cyan-900/30',
        'success' => 'border-green-200 bg-green-50/90 dark:border-green-800/50 dark:bg-green-900/30',
        'warning' => 'border-amber-200 bg-amber-50/90 dark:border-amber-800/50 dark:bg-amber-900/30',
        'danger' => 'border-red-200 bg-red-50/90 dark:border-red-800/50 dark:bg-red-900/30',
    ];

    $iconClasses = [
        'default' => 'text-gray-500 dark:text-gray-400',
        'info' => 'text-cyan-600 dark:text-cyan-500',
        'success' => 'text-green-600 dark:text-green-500',
        'warning' => 'text-amber-600 dark:text-amber-500',
        'danger' => 'text-red-600 dark:text-red-500',
    ];

    $descriptionClasses = [
        'default' => 'text-gray-600 dark:text-gray-300',
        'info' => 'text-cyan-700 dark:text-cyan-200',
        'success' => 'text-green-700 dark:text-green-200',
        'warning' => 'text-amber-700 dark:text-amber-200',
        'danger' => 'text-red-700 dark:text-red-200',
    ];

    $closeClasses = [
        'default' => 'text-gray-400 hover:bg-gray-100 hover:text-gray-600 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-gray-300',
        'info' => 'text-cyan-400 hover:bg-cyan-100/50 hover:text-cyan-500 dark:text-cyan-600 dark:hover:bg-cyan-800/30 dark:hover:text-cyan-400',
        'success' => 'text-green-400 hover:bg-green-100/50 hover:text-green-500 dark:text-green-600 dark:hover:bg-green-800/30 dark:hover:text-green-400',
        'warning' => 'text-amber-400 hover:bg-amber-100/50 hover:text-amber-500 dark:text-amber-600 dark:hover:bg-amber-800/30 dark:hover:text-amber-400',
        'danger' => 'text-red-400 hover:bg-red-100/50 hover:text-red-500 dark:text-red-600 dark:hover:bg-red-800/30 dark:hover:text-red-400',
    ];

    // SVG paths for icons (lucide icons)
    $icons = [
        'default' => '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>',
        'info' => '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>',
        'success' => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'warning' => '<path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/>',
        'danger' => '<circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/>',
    ];

    // Determine transition direction based on position
    $isLeft = str_contains($position, 'left');
    $isCenter = str_contains($position, 'center');
    $translateStart = $isCenter ? 'translate-y-4' : ($isLeft ? '-translate-x-full' : 'translate-x-full');
@endphp

<div
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    x-data="{
        toasts: [],
        variantClasses: @js($variantClasses),
        iconClasses: @js($iconClasses),
        descriptionClasses: @js($descriptionClasses),
        closeClasses: @js($closeClasses),
        icons: @js($icons),
        duration: @js($duration),
        translateStart: @js($translateStart),

        add(toast) {
            const id = Date.now() + Math.random();
            this.toasts.push({
                id,
                variant: toast.variant || 'default',
                title: toast.title || '',
                description: toast.description || '',
                dismissible: toast.dismissible !== false,
                icon: toast.icon !== false,
                open: false,
            });

            this.$nextTick(() => {
                const t = this.toasts.find(t => t.id === id);
                if (t) t.open = true;
            });

            if (toast.duration !== 0) {
                setTimeout(() => this.dismiss(id), toast.duration || this.duration);
            }
        },

        dismiss(id) {
            const toast = this.toasts.find(t => t.id === id);
            if (toast) {
                toast.open = false;
                setTimeout(() => this.toasts = this.toasts.filter(t => t.id !== id), 200);
            }
        },
    }"
    x-on:toast.window="add($event.detail)"
    @if (class_exists('Livewire\Livewire'))
        x-init="Livewire.on('toast', (data) => add(Array.isArray(data) ? data[0] : data))"
    @endif
    data-toaster
    data-position="{{ $position }}"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            class="pointer-events-auto flex min-w-80 max-w-md items-start gap-3 rounded-lg border p-4 shadow-lg backdrop-blur-xl"
            :class="variantClasses[toast.variant]"
            :data-variant="toast.variant"
            x-show="toast.open"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            :class="{ [translateStart]: !toast.open }"
            x-transition:enter-end="opacity-100 translate-x-0 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-x-0 translate-y-0"
            x-transition:leave-end="opacity-0"
            data-toaster-item
        >
            <svg
                x-show="toast.icon"
                x-html="icons[toast.variant]"
                class="mt-0.5 size-5 shrink-0"
                :class="iconClasses[toast.variant]"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                data-toast-icon
            ></svg>

            <div class="flex-1" data-toaster-content>
                <div class="font-semibold leading-6 text-gray-900 dark:text-white" x-text="toast.title" data-toaster-title></div>
                <div x-show="toast.description" x-text="toast.description" :class="descriptionClasses[toast.variant]" data-toaster-description></div>
            </div>

            <button
                x-show="toast.dismissible"
                class="-mr-1 -mt-1 flex size-6 shrink-0 cursor-pointer items-center justify-center rounded"
                :class="closeClasses[toast.variant]"
                type="button"
                x-on:click="dismiss(toast.id)"
                data-toaster-close
            >
                <svg
                    class="size-4 shrink-0"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
    </template>
</div>
