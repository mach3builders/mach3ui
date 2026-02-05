@props([
    'characterCount' => false,
    'hint' => null,
    'label' => null,
    'name' => null,
    'placeholder' => 'Write something...',
    'toolbar' => ['formatting', 'headings', 'lists', 'extras'],
])

@php
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;
    $xModelValue = null;

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $value;
            break;
        }
    }

    $xModelKey = null;
    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'x-model')) {
            $xModelKey = $key;
            $xModelValue = $value;
            break;
        }
    }

    $editorName = $name ?: $wireModelValue ?: $xModelValue ?: null;
    $id = $attributes->get('id') ?? ($editorName ? $editorName : 'editor-' . uniqid());
    $error = $editorName ? $errors->first($editorName) ?? null : null;
    $toolbarGroups = is_array($toolbar) ? $toolbar : explode(',', $toolbar);

    $wrapperClasses = UI::classes()
        ->add('ui-editor relative overflow-hidden rounded-md border shadow-xs')
        ->add($error
            ? 'border-red-500 dark:border-red-500'
            : 'border-gray-140 dark:border-gray-700'
        )
        ->add('bg-white dark:bg-gray-800')
        ->merge($attributes->only('class'));

    $toolbarClasses = 'flex flex-wrap items-center gap-1 border-b p-1.5 border-gray-140 dark:border-gray-700 bg-gray-20 dark:bg-gray-820';

    $btnClasses = 'ui-editor-btn inline-flex h-8 w-8 items-center justify-center rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled:cursor-not-allowed disabled:opacity-50';

    $btnActiveClasses = 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white';

    $contentClasses = 'ui-editor-content relative min-h-48 max-h-96 overflow-y-auto p-4 text-sm leading-relaxed outline-none text-gray-900 dark:text-gray-100';
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label>{{ $label }}</ui:label>

        <x-ui::editor._editor
            :id="$id"
            :name="$editorName"
            :placeholder="$placeholder"
            :toolbar-groups="$toolbarGroups"
            :character-count="$characterCount"
            :wrapper-classes="$wrapperClasses"
            :toolbar-classes="$toolbarClasses"
            :btn-classes="$btnClasses"
            :btn-active-classes="$btnActiveClasses"
            :content-classes="$contentClasses"
            :wire-model-value="$wireModelValue"
            :x-model-key="$xModelKey"
            :x-model-value="$xModelValue"
        >{{ $slot }}</x-ui::editor._editor>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($editorName)
            <ui:error :name="$editorName" />
        @endif
    </ui:field>
@else
    <x-ui::editor._editor
        :id="$id"
        :name="$editorName"
        :placeholder="$placeholder"
        :toolbar-groups="$toolbarGroups"
        :character-count="$characterCount"
        :wrapper-classes="$wrapperClasses"
        :toolbar-classes="$toolbarClasses"
        :btn-classes="$btnClasses"
        :btn-active-classes="$btnActiveClasses"
        :content-classes="$contentClasses"
        :wire-model-value="$wireModelValue"
        :x-model-key="$xModelKey"
        :x-model-value="$xModelValue"
    >{{ $slot }}</x-ui::editor._editor>
@endif
