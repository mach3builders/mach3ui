@props([
    'action' => null,
    'icon' => null,
    'title' => null,
])

<button type="button" @if ($action) data-rich-text-editor-action="{{ $action }}" @endif
    @if ($title) title="{{ $title }}" @endif class="rich-text-editor-toolbar-btn"
    {{ $attributes }}>
    {{ svg('lucide-' . $icon, 'shrink-0 size-4') }}
</button>
