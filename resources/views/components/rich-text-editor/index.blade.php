@props([
    'id' => null,
    'name' => 'content',
    'placeholder' => 'Write something...',
    'showCharacterCount' => false,
    'toolbar' => 'full',
    'value' => null,
    'variant' => 'default',
])

@php
    $editorId = $id ?? 'rich-text-editor-' . Str::random(8);

    $classes = Ui::classes()
        ->add('rich-text-editor')
        ->when($variant === 'inset', 'rich-text-editor-inset')
        ->merge($attributes->only('class'));

    $toolbarGroups = [
        'minimal' => [['bold', 'italic', 'link']],
        'basic' => [['bold', 'italic', 'strike'], ['bullet-list', 'ordered-list'], ['undo', 'redo']],
        'full' => [
            ['bold', 'italic', 'strike', 'code'],
            ['heading-1', 'heading-2', 'heading-3'],
            ['bullet-list', 'ordered-list', 'blockquote', 'code-block'],
            ['link', 'image', 'horizontal-rule'],
            ['undo', 'redo'],
        ],
    ];

    $tools = [
        'bold' => ['icon' => 'bold', 'title' => 'Bold'],
        'italic' => ['icon' => 'italic', 'title' => 'Italic'],
        'strike' => ['icon' => 'strikethrough', 'title' => 'Strikethrough'],
        'code' => ['icon' => 'code', 'title' => 'Inline code'],
        'heading-1' => ['icon' => 'heading-1', 'title' => 'Heading 1'],
        'heading-2' => ['icon' => 'heading-2', 'title' => 'Heading 2'],
        'heading-3' => ['icon' => 'heading-3', 'title' => 'Heading 3'],
        'bullet-list' => ['icon' => 'list', 'title' => 'Bullet list'],
        'ordered-list' => ['icon' => 'list-ordered', 'title' => 'Numbered list'],
        'blockquote' => ['icon' => 'quote', 'title' => 'Quote'],
        'code-block' => ['icon' => 'file-code', 'title' => 'Code block'],
        'link' => ['icon' => 'link', 'title' => 'Link', 'popover' => true],
        'image' => ['icon' => 'image', 'title' => 'Image', 'popover' => true],
        'horizontal-rule' => ['icon' => 'minus', 'title' => 'Horizontal rule'],
        'undo' => ['icon' => 'undo-2', 'title' => 'Undo'],
        'redo' => ['icon' => 'redo-2', 'title' => 'Redo'],
    ];

    $groups = is_array($toolbar) ? $toolbar : $toolbarGroups[$toolbar] ?? $toolbarGroups['full'];
@endphp

<div class="{{ $classes }}" data-rich-text-editor data-placeholder="{{ $placeholder }}">
    <div class="rich-text-editor-toolbar">
        @foreach ($groups as $groupIndex => $group)
            @if ($groupIndex > 0)
                <div class="rich-text-editor-toolbar-separator"></div>
            @endif

            <div class="rich-text-editor-toolbar-group">
                @foreach ($group as $tool)
                    @php $t = $tools[$tool] ?? null; @endphp
                    @if ($t)
                        @if (!empty($t['popover']))
                            <div class="rich-text-editor-toolbar-popover">
                                <button type="button" class="rich-text-editor-toolbar-btn"
                                    data-rich-text-editor-action="{{ $tool }}" title="{{ $t['title'] }}"
                                    popovertarget="{{ $editorId }}-{{ $tool }}-popover">
                                    <x-dynamic-component :component="'lucide-' . $t['icon']" />
                                </button>

                                <div class="rich-text-editor-popover"
                                    id="{{ $editorId }}-{{ $tool }}-popover"
                                    data-rich-text-editor-popover="{{ $tool }}" popover>
                                    @if ($tool === 'link')
                                        <div class="rich-text-editor-popover-title">Insert Link</div>

                                        <input type="url" class="rich-text-editor-popover-input"
                                            placeholder="https://example.com" />

                                        <div class="rich-text-editor-popover-actions">
                                            <ui:button variant="danger" size="sm" data-action="remove">Remove
                                            </ui:button>

                                            <ui:button variant="primary" size="sm" data-action="apply">Apply
                                            </ui:button>
                                        </div>
                                    @elseif ($tool === 'image')
                                        <div class="rich-text-editor-popover-title">Insert Image</div>

                                        <input type="url" class="rich-text-editor-popover-input"
                                            placeholder="https://example.com/image.jpg" />

                                        <div class="rich-text-editor-popover-actions">
                                            <ui:button variant="primary" size="sm" data-action="apply">Insert
                                            </ui:button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <button type="button" class="rich-text-editor-toolbar-btn"
                                data-rich-text-editor-action="{{ $tool }}" title="{{ $t['title'] }}">
                                <x-dynamic-component :component="'lucide-' . $t['icon']" />
                            </button>
                        @endif
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="rich-text-editor-content"></div>

    @if ($showCharacterCount)
        <div class="rich-text-editor-footer">
            <span class="rich-text-editor-character-count">0 characters</span>
        </div>
    @endif

    <input type="hidden" name="{{ $name }}"
        @if ($value) value="{{ $value }}" @endif
        {{ $attributes->whereStartsWith('wire:model') }} />
</div>
