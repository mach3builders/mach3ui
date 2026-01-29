<div
    class="flex gap-1"
    data-theme-switcher
    x-data="{
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
    x-init="$watch('mode', value => setMode(value))"
>
    <ui:button
        icon="monitor-cog"
        variant="ghost"
        size="sm"
        x-bind:data-active="mode === 'system' ? '' : null"
        x-on:click="mode = 'system'"
    />

    <ui:button
        icon="sun"
        variant="ghost"
        size="sm"
        x-bind:data-active="mode === 'light' ? '' : null"
        x-on:click="mode = 'light'"
    />

    <ui:button
        icon="moon"
        variant="ghost"
        size="sm"
        x-bind:data-active="mode === 'dark' ? '' : null"
        x-on:click="mode = 'dark'"
    />
</div>
