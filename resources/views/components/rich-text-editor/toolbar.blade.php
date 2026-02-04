@props([
    'groups' => ['formatting', 'headings', 'lists', 'extras'],
])

@php
    $groupsArray = is_array($groups) ? $groups : explode(',', $groups);
@endphp

<div class="rich-text-editor-toolbar">
    @foreach ($groupsArray as $index => $group)
        @if ($index > 0)
            <div class="rich-text-editor-toolbar-separator"></div>
        @endif

        @switch(trim($group))
            @case('formatting')
                <div class="rich-text-editor-toolbar-group">
                    <x-ui::rich-text-editor.toolbar-button action="bold" icon="bold" title="Bold" />
                    <x-ui::rich-text-editor.toolbar-button action="italic" icon="italic" title="Italic" />
                    <x-ui::rich-text-editor.toolbar-button action="strike" icon="strikethrough" title="Strikethrough" />
                    <x-ui::rich-text-editor.toolbar-button action="code" icon="code" title="Inline code" />
                </div>
                @break

            @case('headings')
                <div class="rich-text-editor-toolbar-group">
                    <x-ui::rich-text-editor.toolbar-button action="heading-1" icon="heading-1" title="Heading 1" />
                    <x-ui::rich-text-editor.toolbar-button action="heading-2" icon="heading-2" title="Heading 2" />
                    <x-ui::rich-text-editor.toolbar-button action="heading-3" icon="heading-3" title="Heading 3" />
                </div>
                @break

            @case('lists')
                <div class="rich-text-editor-toolbar-group">
                    <x-ui::rich-text-editor.toolbar-button action="bullet-list" icon="list" title="Bullet list" />
                    <x-ui::rich-text-editor.toolbar-button action="ordered-list" icon="list-ordered" title="Numbered list" />
                </div>
                @break

            @case('extras')
                <div class="rich-text-editor-toolbar-group">
                    <x-ui::rich-text-editor.toolbar-button action="blockquote" icon="quote" title="Blockquote" />
                    <x-ui::rich-text-editor.toolbar-button action="code-block" icon="file-code" title="Code block" />
                    <x-ui::rich-text-editor.toolbar-button action="horizontal-rule" icon="minus" title="Horizontal rule" />
                </div>
                @break

            @case('link')
                <x-ui::rich-text-editor.link-popover />
                @break

            @case('image')
                <x-ui::rich-text-editor.image-popover />
                @break

            @case('history')
                <div class="rich-text-editor-toolbar-group">
                    <x-ui::rich-text-editor.toolbar-button action="undo" icon="undo" title="Undo" />
                    <x-ui::rich-text-editor.toolbar-button action="redo" icon="redo" title="Redo" />
                </div>
                @break

            @case('clear')
                <div class="rich-text-editor-toolbar-group">
                    <x-ui::rich-text-editor.toolbar-button action="clear" icon="eraser" title="Clear formatting" />
                </div>
                @break
        @endswitch
    @endforeach
</div>
