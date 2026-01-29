@props(['language' => 'text', 'filename' => null])

<div
    class="code-block"
    x-data="{ copied: false }"
    data-code-block
>
    @if ($filename)
        <div class="code-header">
            <span class="code-filename">{{ $filename }}</span>
        </div>
    @endif

    <pre><code class="language-{{ $language }}" x-ref="code">{{ $slot }}</code></pre>

    <ui:button
        variant="ghost"
        class="btn-icon copy-btn"
        :class="{ 'copied': copied }"
        x-on:click="navigator.clipboard.writeText($refs.code.textContent).then(() => { copied = true; setTimeout(() => copied = false, 2000); })"
    >
        <x-lucide-copy class="copy-icon" />

        <x-lucide-check class="check-icon" />
    </ui:button>
</div>
