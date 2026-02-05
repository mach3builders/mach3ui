@blaze

@props([
    'hint' => null,
    'label' => null,
    'name' => null,
    'placeholder' => 'Add tag...',
    'size' => 'md',
    'tags' => [],
    'variant' => 'default',
])

@aware(['id'])

@php
    $inputName = $name ?: $id;

    $id =
        $attributes->get('id') ??
        ($id ?? ($inputName ?? Ui::uniqueId('input-tags')));

    $error = $inputName ? $errors->first($inputName) ?? null : null;
    $disabled = $attributes->has('disabled');

    $tagsArray = is_array($tags) ? $tags : (is_string($tags) ? json_decode($tags, true) ?? [] : []);

    $containerClasses = Ui::classes()
        ->add('flex w-full flex-wrap items-center gap-1.5 rounded-md border shadow-xs cursor-text')
        ->add($size, [
            'sm' => 'min-h-8 px-2 py-1',
            'md' => 'min-h-10 px-2.5 py-1.5',
            'lg' => 'min-h-12 px-3 py-2',
        ])
        ->add(
            match (true) {
                (bool) $error
                    => 'border-red-500 bg-white focus-within:border-red-500 dark:border-red-500 dark:bg-gray-800 dark:focus-within:border-red-500',
                $variant === 'inverted'
                    => 'border-gray-140 bg-gray-10 focus-within:border-gray-400 dark:border-gray-700 dark:bg-gray-820 dark:focus-within:border-gray-600',
                default
                    => 'border-gray-140 bg-white focus-within:border-gray-400 dark:border-gray-700 dark:bg-gray-800 dark:focus-within:border-gray-500',
            },
        )
        ->when($disabled, 'cursor-not-allowed opacity-50')
        ->merge($attributes->only('class'));

    $tagClasses = Ui::classes()
        ->add('inline-flex items-center gap-1 rounded bg-gray-80 font-medium text-gray-700 select-none')
        ->add('dark:bg-gray-700 dark:text-gray-200')
        ->add($size, [
            'sm' => 'px-1.5 py-0 text-xs',
            'md' => 'px-2 py-0.5 text-sm',
            'lg' => 'px-2.5 py-1 text-base',
        ]);

    $removeClasses = Ui::classes()
        ->add('inline-flex shrink-0 items-center justify-center rounded cursor-pointer')
        ->add('text-gray-500 hover:bg-gray-200 hover:text-gray-700')
        ->add('dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-gray-200')
        ->add($size, [
            'sm' => 'size-3.5',
            'md' => 'size-4',
            'lg' => 'size-5',
        ]);

    $inputClasses = Ui::classes()
        ->add('min-w-20 flex-1 border-0 bg-transparent p-0 px-1 outline-none focus:ring-0')
        ->add('text-gray-900 placeholder-gray-400 dark:text-gray-100 dark:placeholder-gray-500')
        ->add($size, [
            'sm' => 'h-5 text-xs',
            'md' => 'h-7 text-sm',
            'lg' => 'h-9 text-base',
        ]);

    $passthrough = $attributes
        ->whereDoesntStartWith(['class'])
        ->except(['tags', 'label', 'hint', 'name', 'placeholder', 'size', 'variant', 'id']);
@endphp

<ui:field :id="$id">
    @if ($label)
        <ui:label>{{ $label }}</ui:label>
    @endif

    <div wire:ignore x-data="{
        tags: @js($tagsArray),
        input: '',
    
        add() {
            const value = this.input.trim();
            if (value && !this.tags.includes(value)) {
                this.tags = [...this.tags, value];
            }
            this.input = '';
        },
    
        remove(index) {
            this.tags = this.tags.filter((_, i) => i !== index);
        }
    }" x-modelable="tags" x-on:click="$refs.input.focus()"
        class="{{ $containerClasses }}" {{ $passthrough }} data-control>
        <template x-for="(tag, index) in tags" :key="tag + '-' + index">
            <span class="{{ $tagClasses }}">
                <span x-text="tag"></span>
                <button type="button" class="{{ $removeClasses }}" x-on:click.stop="remove(index)"
                    @disabled($disabled)>
                    <ui:icon name="x" size="xs" />
                </button>
            </span>
        </template>

        <input type="text" x-ref="input" x-model="input" x-on:keydown.enter.prevent="add()"
            x-on:keydown.tab="if (input.trim()) { $event.preventDefault(); add(); }"
            x-on:keydown.backspace="if (!input && tags.length) remove(tags.length - 1)" x-on:blur="add()"
            placeholder="{{ $placeholder }}" class="{{ $inputClasses }}" @disabled($disabled)>

        @if ($inputName)
            <template x-for="(tag, index) in tags" :key="'hidden-' + tag + '-' + index">
                <input type="hidden" :name="'{{ $inputName }}[]'" :value="tag">
            </template>
        @endif
    </div>

    @if ($hint && !$error)
        <ui:hint>{{ $hint }}</ui:hint>
    @endif

    @if ($inputName)
        <ui:error :name="$inputName" />
    @endif
</ui:field>
