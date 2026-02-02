@props([])

@php
    $classes = Ui::classes()->add('flex gap-1')->merge($attributes->only('class'));

    $modes = [
        'system' => 'monitor-cog',
        'light' => 'sun',
        'dark' => 'moon',
    ];
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-theme-switcher x-data="{
    mode: localStorage.getItem('mach3ui-theme') || 'system',

    setMode(mode) {
        const html = document.documentElement;
        const isSystem = !mode || mode === 'system';

        if (isSystem) {
            localStorage.removeItem('mach3ui-theme');
            mode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        } else {
            localStorage.setItem('mach3ui-theme', mode);
        }

        html.classList.toggle('dark', mode === 'dark');
        html.classList.toggle('light', mode === 'light');
    }
}"
    x-init="$watch('mode', value => setMode(value))">
    @foreach ($modes as $mode => $icon)
        <ui:button :icon="$icon" variant="ghost" size="sm" :aria-label="ucfirst($mode).
        ' mode'"
            x-bind:data-active="mode === '{{ $mode }}' ? '' : null" x-on:click="mode = '{{ $mode }}'" />
    @endforeach
</div>
