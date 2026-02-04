@props([])

@php
    $popoverId = 'image-popover-' . Str::random(8);
@endphp

<div class="rich-text-editor-toolbar-popover">
    <button
        type="button"
        data-rich-text-editor-action="image"
        title="Image"
        class="rich-text-editor-toolbar-btn"
        popovertarget="{{ $popoverId }}"
    >
        <ui:icon name="image" size="sm" />
    </button>

    <div
        id="{{ $popoverId }}"
        popover
        class="rich-text-editor-popover"
        data-rich-text-editor-popover="image"
    >
        <span class="rich-text-editor-popover-title">Insert image</span>

        <input
            type="url"
            placeholder="https://example.com/image.jpg"
            class="rich-text-editor-popover-input"
        >

        <div class="rich-text-editor-popover-actions">
            <ui:button
                variant="primary"
                size="sm"
                data-action="apply"
            >
                Insert
            </ui:button>
        </div>
    </div>
</div>
