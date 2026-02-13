@props([
    'accept' => null,
    'field:variant' => null,
    'hint' => null,
    'label' => null,
    'multiple' => false,
    'name' => null,
    'size' => 'md',
])

@aware(['id'])

@php
    // Get wire:model value directly from attributes
    $allAttrs = $attributes->getAttributes();
    $wireModelValue = null;

    foreach ($allAttrs as $key => $value) {
        if (str_starts_with($key, 'wire:model')) {
            $wireModelValue = $value;
            break;
        }
    }

    // Name priority: prop > wire:model > field id
    $inputName = $name ?: $wireModelValue ?: $id;

    // ID priority: explicit id attr > field id (@aware) > input name > auto-generated
    $id = $attributes->get('id') ?? ($id ?? ($inputName ?? 'file-' . Str::random(8)));

    $error = $inputName ? $errors->first($inputName) ?? null : null;
    $fieldVariant = $__data['field:variant'] ?? null;

    $translations = [
        'choose' => $multiple ? __('Choose files') : __('Choose file'),
        'noFile' => __('No file chosen'),
        'files' => __('files'),
    ];

    $wrapperClasses = Ui::classes()
        ->add('relative flex w-full items-center gap-3')
        ->merge($attributes->only('class'));

    $buttonClasses = Ui::classes()
        ->add('inline-flex cursor-pointer select-none items-center justify-center whitespace-nowrap border font-semibold uppercase')
        ->add('rounded-md transition-colors duration-150')
        ->add('focus-visible:ring-1 focus-visible:ring-offset-1 focus-visible:outline-none')
        ->add('border-gray-100 bg-white text-gray-900 shadow-xs hover:border-gray-140 hover:bg-gray-20')
        ->add('dark:border-gray-700 dark:bg-gray-780 dark:text-gray-100 dark:hover:border-gray-660 dark:hover:bg-gray-750')
        ->add('focus-visible:ring-gray-200 focus-visible:ring-offset-white dark:focus-visible:ring-gray-600 dark:focus-visible:ring-offset-gray-800')
        ->add($size, [
            'sm' => 'min-h-8 gap-1.5 px-3 text-xs',
            'md' => 'min-h-10 px-4 py-2 text-xs',
            'lg' => 'min-h-12 gap-2.5 px-6 text-sm',
        ])
        ->when((bool) $error, 'border-red-500 dark:border-red-500');

    $labelClasses = Ui::classes()
        ->add('cursor-default select-none truncate whitespace-nowrap font-medium')
        ->add($size, [
            'sm' => 'text-xs',
            'md' => 'text-sm',
            'lg' => 'text-base',
        ])
        ->add((bool) $error
            ? 'text-red-600 dark:text-red-400'
            : 'text-gray-500 dark:text-gray-400');
@endphp

@if ($label)
    <ui:field :id="$id" :variant="$fieldVariant ?? 'block'">
        <ui:label>{{ $label }}</ui:label>

        <div
            class="{{ $wrapperClasses }}"
            x-data="{
                files: [],
                get label() {
                    if (this.files.length === 0) return '{{ $translations['noFile'] }}';
                    if (this.files.length === 1) return this.files[0].name;
                    return this.files.length + ' {{ $translations['files'] }}';
                }
            }"
            x-on:click="$refs.input.click()"
            x-on:keydown.enter.prevent="$refs.input.click()"
            x-on:keydown.space.prevent
            x-on:keyup.space.prevent="$refs.input.click()"
            data-input-file
        >
            <input
                x-ref="input"
                x-on:click.stop
                x-on:change="files = Array.from($event.target.files)"
                type="file"
                class="sr-only"
                tabindex="-1"
                id="{{ $id }}"
                @if ($inputName) name="{{ $inputName }}" @endif
                @if ($accept) accept="{{ $accept }}" @endif
                @if ($multiple) multiple @endif
                @if ($error) aria-invalid="true" @endif
                {{ $attributes->except(['class', 'id', 'name', 'accept', 'multiple']) }}
            >

            <div class="{{ $buttonClasses }}" tabindex="0" aria-hidden="true">
                {{ $translations['choose'] }}
            </div>

            <span x-text="label" class="{{ $labelClasses }}" aria-hidden="true"></span>
        </div>

        @if ($hint)
            <ui:hint>{{ $hint }}</ui:hint>
        @endif

        @if ($inputName)
            <ui:error :name="$inputName" />
        @endif
    </ui:field>
@else
    <div
        class="{{ $wrapperClasses }}"
        x-data="{
            files: [],
            get label() {
                if (this.files.length === 0) return '{{ $translations['noFile'] }}';
                if (this.files.length === 1) return this.files[0].name;
                return this.files.length + ' {{ $translations['files'] }}';
            }
        }"
        x-on:click="$refs.input.click()"
        x-on:keydown.enter.prevent="$refs.input.click()"
        x-on:keydown.space.prevent
        x-on:keyup.space.prevent="$refs.input.click()"
        data-input-file
    >
        <input
            x-ref="input"
            x-on:click.stop
            x-on:change="files = Array.from($event.target.files)"
            type="file"
            class="sr-only"
            tabindex="-1"
            id="{{ $id }}"
            @if ($inputName) name="{{ $inputName }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            @if ($multiple) multiple @endif
            @if ($error) aria-invalid="true" @endif
            {{ $attributes->except(['class', 'id', 'name', 'accept', 'multiple']) }}
        >

        <div class="{{ $buttonClasses }}" tabindex="0" aria-hidden="true">
            {{ $translations['choose'] }}
        </div>

        <span x-text="label" class="{{ $labelClasses }}" aria-hidden="true"></span>
    </div>
@endif
