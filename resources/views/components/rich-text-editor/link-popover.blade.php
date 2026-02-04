@props([])

@php
    $popoverId = 'link-popover-' . Str::random(8);
@endphp

<div class="rich-text-editor-toolbar-popover">
    <button
        type="button"
        data-rich-text-editor-action="link"
        title="Link"
        class="rich-text-editor-toolbar-btn"
        popovertarget="{{ $popoverId }}"
    >
        <ui:icon name="link" size="sm" />
    </button>

    <div
        id="{{ $popoverId }}"
        popover
        class="rich-text-editor-popover"
        data-rich-text-editor-popover="link"
    >
        <span class="rich-text-editor-popover-title">Insert link</span>

        <input
            type="url"
            placeholder="https://example.com"
            class="rich-text-editor-popover-input"
        >

        <div class="rich-text-editor-popover-actions">
            <ui:button
                variant="ghost"
                size="sm"
                data-action="remove"
            >
                Remove
            </ui:button>
            <ui:button
                variant="primary"
                size="sm"
                data-action="apply"
            >
                Apply
            </ui:button>
        </div>
    </div>
</div>
