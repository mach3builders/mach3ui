@blaze

@props([
    'characterCount' => false,
    'hint' => null,
    'label' => null,
    'name' => null,
    'placeholder' => 'Write something...',
    'toolbar' => ['formatting', 'headings', 'lists', 'extras'],
    'variant' => 'default',
])

@aware(['id'])

@php
    // Get wire:model or x-model value directly from attributes
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $value;
            break;
        }
    }

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'x-model')) {
            $xModelValue = $value;
            break;
        }
    }

    // Name priority: prop > wire:model > x-model > field id
    $editorName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > editor name > auto-generated
    $id =
        $attributes->get('id') ??
        ($id ?? ($editorName ?? Ui::uniqueId('rich-text-editor')));

    $error = $editorName ? $errors->first($editorName) ?? null : null;

    // Toolbar groups
    $toolbarGroups = is_array($toolbar) ? $toolbar : explode(',', $toolbar);

    $wrapperClasses = Ui::classes()
        ->add('rich-text-editor')
        ->when($variant === 'inset', 'rich-text-editor-inset')
        ->when($error, 'ring-1 ring-red-500')
        ->merge($attributes->only('class'));
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label>{{ $label }}</ui:label>

        <div class="{{ $wrapperClasses }}" data-placeholder="{{ $placeholder }}"
            {{ $attributes->except(['class', 'name', 'id']) }}>
            <x-ui::rich-text-editor.toolbar :groups="$toolbarGroups" />

            <div class="rich-text-editor-content"></div>

            @if ($characterCount)
                <div class="rich-text-editor-footer">
                    <span class="rich-text-editor-character-count">0 characters</span>
                </div>
            @endif

            <textarea id="{{ $id }}" @if ($editorName) name="{{ $editorName }}" @endif
                @if ($error) aria-invalid="true" @endif
                {{ $attributes->whereStartsWith(['wire:', 'x-model']) }} class="sr-only">{{ $slot }}</textarea>
        </div>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($editorName)
            <ui:error :name="$editorName" />
        @endif
    </ui:field>
@else
    <div class="{{ $wrapperClasses }}" data-placeholder="{{ $placeholder }}"
        {{ $attributes->except(['class', 'name', 'id']) }}>
        <x-ui::rich-text-editor.toolbar :groups="$toolbarGroups" />

        <div class="rich-text-editor-content"></div>

        @if ($characterCount)
            <div class="rich-text-editor-footer">
                <span class="rich-text-editor-character-count">0 characters</span>
            </div>
        @endif

        <textarea id="{{ $id }}" @if ($editorName) name="{{ $editorName }}" @endif
            @if ($error) aria-invalid="true" @endif
            {{ $attributes->whereStartsWith(['wire:', 'x-model']) }} class="sr-only">{{ $slot }}</textarea>
    </div>
@endif
