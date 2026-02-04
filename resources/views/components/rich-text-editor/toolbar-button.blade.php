@props([
    'action' => null,
    'icon' => null,
    'title' => null,
])

<button
    type="button"
    @if ($action) data-rich-text-editor-action="{{ $action }}" @endif
    @if ($title) title="{{ $title }}" @endif
    class="rich-text-editor-toolbar-btn"
    {{ $attributes }}
>
    <ui:icon :name="$icon" size="sm" />
</button>
