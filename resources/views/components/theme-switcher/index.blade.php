@props([
    'size' => 'sm',
    'storageKey' => 'theme',
    'variant' => 'ghost',
])

@php
    $classes = Ui::classes()
        ->add('inline-flex gap-1')
        ->merge($attributes);

    $modes = [
        'system' => 'monitor-cog',
        'light' => 'sun',
        'dark' => 'moon',
    ];
@endphp

<div
    x-data="{
        mode: localStorage.getItem('{{ $storageKey }}') || 'system',

        init() {
            this.applyTheme(this.mode)
            this.$watch('mode', value => this.setMode(value))

            {{-- Listen for system preference changes --}}
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (this.mode === 'system') this.applyTheme('system')
            })
        },

        setMode(mode) {
            if (!mode || mode === 'system') {
                localStorage.removeItem('{{ $storageKey }}')
            } else {
                localStorage.setItem('{{ $storageKey }}', mode)
            }
            this.applyTheme(mode)
        },

        applyTheme(mode) {
            const html = document.documentElement
            const resolved = mode === 'system'
                ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light')
                : mode

            html.classList.toggle('dark', resolved === 'dark')
            html.classList.toggle('light', resolved === 'light')
        }
    }"
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    data-theme-switcher
>
    @foreach ($modes as $mode => $icon)
        <ui:button
            :icon="$icon"
            :variant="$variant"
            :size="$size"
            :aria-label="ucfirst($mode) . ' mode'"
            x-on:click="mode = '{{ $mode }}'"
            x-bind:data-active="mode === '{{ $mode }}' ? '' : null"
        />
    @endforeach
</div>
