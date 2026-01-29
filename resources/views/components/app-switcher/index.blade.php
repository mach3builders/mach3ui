@props([
    'current' => 0,
])

<div x-data="{
    open: false,
    selected: 0,
    current: {{ $current }},
    items: [],

    init() {
        this.items = [...this.$refs.list.querySelectorAll('[data-app-switcher-item]')]
        this.selected = this.current
    },

    toggle() {
        this.open ? this.close() : this.openSwitcher()
    },

    openSwitcher() {
        this.open = true
        this.selected = this.current
        document.body.classList.add('overflow-hidden')
    },

    close() {
        this.open = false
        document.body.classList.remove('overflow-hidden')
    },

    next() {
        this.selected = (this.selected + 1) % this.items.length
    },

    select(index) {
        index = parseInt(index)
        if (index >= 0 && index < this.items.length) {
            this.selected = index
        }
    },

    activate() {
        if (this.selected === this.current) {
            this.close()
            return
        }
        this.current = this.selected
        const item = this.items[this.selected]
        if (item) {
            const href = item.dataset.href
            if (href && href !== '#') {
                window.location.href = href
            }
            this.$dispatch('app-switch', {
                index: this.selected,
                name: item.dataset.name,
                element: item
            })
        }
        this.close()
    },

    handleKeydown(e) {
        if ((e.ctrlKey || e.altKey) && e.key.toLowerCase() === 'a') {
            e.preventDefault()
            if (this.open) {
                this.next()
            } else {
                this.openSwitcher()
            }
            return
        }

        if (!this.open) return

        if (e.key === 'Escape') {
            e.preventDefault()
            this.close()
        } else if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault()
            this.activate()
        } else if (e.key >= '1' && e.key <= '9') {
            e.preventDefault()
            const num = parseInt(e.key) - 1
            if (num < this.items.length) {
                this.select(num)
                this.activate()
            }
        }
    },

    handleKeyup(e) {
        if (this.open && (e.key === 'Control' || e.key === 'Alt' || e.key === 'Meta')) {
            this.activate()
        }
    }
}" @keydown.window="handleKeydown" @keyup.window="handleKeyup" {{ $attributes }}
    data-app-switcher>
    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.self="close"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/40 dark:bg-black/60" role="dialog"
        aria-modal="true" aria-label="Application Switcher">
        <div x-show="open" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
            class="flex min-w-72 flex-col gap-2 rounded-xl border p-2 shadow-2xl border-gray-100 bg-white dark:border-gray-740 dark:bg-gray-790"
            role="listbox" aria-label="Applications" x-ref="list">
            <div class="px-2 py-1.5 text-xs font-medium text-gray-500 dark:text-gray-400">
                Switch application
            </div>

            {{ $slot }}
        </div>

        <div
            class="fixed bottom-8 left-1/2 -translate-x-1/2 rounded-lg border px-3 py-2 text-xs backdrop-blur-sm border-gray-200 bg-white/95 text-gray-600 dark:border-gray-700 dark:bg-gray-800/95 dark:text-gray-300">
            <ui:kbd>Ctrl</ui:kbd>
            <ui:kbd>A</ui:kbd> cycle · release <ui:kbd>Ctrl</ui:kbd> select · <ui:kbd>Esc</ui:kbd> close
        </div>
    </div>
</div>
