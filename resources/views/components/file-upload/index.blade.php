@props([
    'accept' => null,
    'hint' => null,
    'label' => null,
    'multiple' => false,
    'name' => null,
    'placeholder' => null,
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
    $inputName = $name ?: $wireModelValue ?: $xModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > input name > auto-generated
    $id =
        $attributes->get('id') ??
        ($id ?? ($inputName ?? Ui::uniqueId('file-upload')));

    $error = $inputName ? $errors->first($inputName) ?? null : null;

    $resolvedPlaceholder = $placeholder ?? __('Drop files here or click to upload');
    $dropzoneHint = $multiple ? __('You can select multiple files') : __('Select a file');

    $previewSlot = $__laravel_slots['preview'] ?? null;

    $wrapperClasses = Ui::classes()->add('flex flex-col gap-3')->merge($attributes->only('class'));

    $dropzoneClasses = Ui::classes()
        ->add(
            'group/dropzone relative flex min-h-32 cursor-pointer flex-col items-center justify-center gap-2 rounded-lg border-2 border-dashed p-6',
        )
        ->add('border-gray-140 bg-white hover:border-gray-200 hover:bg-gray-10')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:hover:border-gray-660 dark:hover:bg-gray-790')
        ->when((bool) $error, 'border-red-500 dark:border-red-500');

    $tileClasses = Ui::classes()
        ->add('flex size-24 items-center justify-center rounded-lg border')
        ->add('border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-800');

    $deleteClasses = Ui::classes()
        ->add(
            'group/delete absolute -top-2 -right-2 flex size-6 cursor-pointer items-center justify-center rounded-full border shadow-sm',
        )
        ->add('border-gray-200 bg-white hover:border-red-300 hover:bg-red-50')
        ->add('dark:border-gray-600 dark:bg-gray-700 dark:hover:border-red-500/50 dark:hover:bg-red-900/30');
@endphp

@if ($label)
    <ui:field :id="$id">
        <ui:label :required="$attributes->has('required')">{{ $label }}</ui:label>

        <x-ui::file-upload._file-upload :id="$id" :input-name="$inputName" :accept="$accept" :multiple="$multiple"
            :error="$error" :resolved-placeholder="$resolvedPlaceholder" :dropzone-hint="$dropzoneHint"
            :preview-slot="$previewSlot" :wrapper-classes="$wrapperClasses" :dropzone-classes="$dropzoneClasses"
            :tile-classes="$tileClasses" :delete-classes="$deleteClasses" :attributes="$attributes" />

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($inputName)
            <ui:error :name="$inputName" />
        @endif
    </ui:field>
@else
    <x-ui::file-upload._file-upload :id="$id" :input-name="$inputName" :accept="$accept" :multiple="$multiple"
        :error="$error" :resolved-placeholder="$resolvedPlaceholder" :dropzone-hint="$dropzoneHint"
        :preview-slot="$previewSlot" :wrapper-classes="$wrapperClasses" :dropzone-classes="$dropzoneClasses"
        :tile-classes="$tileClasses" :delete-classes="$deleteClasses" :attributes="$attributes" />
@endif
