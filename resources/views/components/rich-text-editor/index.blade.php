@props([
    'id' => null,
    'name' => 'content',
    'placeholder' => null,
    'showCharacterCount' => false,
    'toolbar' => 'full',
    'value' => null,
    'variant' => 'default',
])

@php
    $placeholder = $placeholder ?? __('ui::ui.rich_text_editor.placeholder');
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
        'bold' => ['icon' => 'bold', 'title' => __('ui::ui.rich_text_editor.bold')],
        'italic' => ['icon' => 'italic', 'title' => __('ui::ui.rich_text_editor.italic')],
        'strike' => ['icon' => 'strikethrough', 'title' => __('ui::ui.rich_text_editor.strikethrough')],
        'code' => ['icon' => 'code', 'title' => __('ui::ui.rich_text_editor.inline_code')],
        'heading-1' => ['icon' => 'heading-1', 'title' => __('ui::ui.rich_text_editor.heading_1')],
        'heading-2' => ['icon' => 'heading-2', 'title' => __('ui::ui.rich_text_editor.heading_2')],
        'heading-3' => ['icon' => 'heading-3', 'title' => __('ui::ui.rich_text_editor.heading_3')],
        'bullet-list' => ['icon' => 'list', 'title' => __('ui::ui.rich_text_editor.bullet_list')],
        'ordered-list' => ['icon' => 'list-ordered', 'title' => __('ui::ui.rich_text_editor.numbered_list')],
        'blockquote' => ['icon' => 'quote', 'title' => __('ui::ui.rich_text_editor.quote')],
        'code-block' => ['icon' => 'file-code', 'title' => __('ui::ui.rich_text_editor.code_block')],
        'link' => ['icon' => 'link', 'title' => __('ui::ui.rich_text_editor.link'), 'popover' => true],
        'image' => ['icon' => 'image', 'title' => __('ui::ui.rich_text_editor.image'), 'popover' => true],
        'horizontal-rule' => ['icon' => 'minus', 'title' => __('ui::ui.rich_text_editor.horizontal_rule')],
        'undo' => ['icon' => 'undo-2', 'title' => __('ui::ui.rich_text_editor.undo')],
        'redo' => ['icon' => 'redo-2', 'title' => __('ui::ui.rich_text_editor.redo')],
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
                                        <div class="rich-text-editor-popover-title">
                                            {{ __('ui::ui.rich_text_editor.insert_link') }}</div>

                                        <input type="url" class="rich-text-editor-popover-input"
                                            placeholder="https://example.com" />

                                        <div class="rich-text-editor-popover-actions">
                                            <ui:button variant="danger" size="sm" data-action="remove">
                                                {{ __('ui::ui.remove') }}
                                            </ui:button>

                                            <ui:button variant="primary" size="sm" data-action="apply">
                                                {{ __('ui::ui.apply') }}
                                            </ui:button>
                                        </div>
                                    @elseif ($tool === 'image')
                                        <div class="rich-text-editor-popover-title">
                                            {{ __('ui::ui.rich_text_editor.insert_image') }}</div>

                                        <input type="url" class="rich-text-editor-popover-input"
                                            placeholder="https://example.com/image.jpg" />

                                        <div class="rich-text-editor-popover-actions">
                                            <ui:button variant="primary" size="sm" data-action="apply">
                                                {{ __('ui::ui.insert') }}
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
            <span class="rich-text-editor-character-count"
                data-characters-text="{{ __('ui::ui.rich_text_editor.characters') }}">{{ __('ui::ui.rich_text_editor.characters', ['count' => 0]) }}</span>
        </div>
    @endif

    <input type="hidden" name="{{ $name }}"
        @if ($value) value="{{ $value }}" @endif
        {{ $attributes->whereStartsWith('wire:model') }} />
</div>
