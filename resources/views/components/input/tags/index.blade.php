@props([
    'disabled' => false,
    'invalid' => false,
    'name' => 'tags',
    'placeholder' => null,
    'size' => null,
    'tags' => [],
])

@php
    $resolvedPlaceholder = $placeholder ?? __('ui::ui.input_tags.placeholder');
    $tagsArray = is_array($tags) ? $tags : (is_string($tags) ? json_decode($tags, true) ?? [] : []);

    $containerClasses = Ui::classes()
        ->add('flex min-h-10 w-full flex-wrap items-center gap-1.5 rounded-md border px-2 py-1.5 shadow-xs')
        ->add('border-gray-140 bg-white')
        ->add('dark:border-gray-700 dark:bg-gray-800')
        ->add('focus-within:border-gray-400 focus-within:outline-none')
        ->add('dark:focus-within:border-gray-640')
        ->when($size === 'sm', 'min-h-8 px-1.5 py-1 text-xs')
        ->when($size === 'lg', 'min-h-12 px-3 py-2 text-base')
        ->when($disabled, 'cursor-not-allowed opacity-50')
        ->when(
            $invalid,
            'border-red-500 focus-within:border-red-600 dark:border-red-500 dark:focus-within:border-red-500',
        )
        ->merge($attributes->only('class'));

    $tagClasses = Ui::classes()
        ->add('inline-flex cursor-default items-center gap-1 rounded px-2 py-0.5 text-sm font-medium select-none')
        ->add('bg-gray-60 text-gray-700')
        ->add('dark:bg-gray-740 dark:text-gray-200')
        ->when($size === 'sm', 'px-1.5 py-0 text-xs')
        ->when($size === 'lg', 'px-2.5 py-1 text-base');

    $removeClasses = Ui::classes()
        ->add('-mr-0.5 ml-0.5 inline-flex size-4 shrink-0 cursor-pointer items-center justify-center rounded')
        ->add('text-gray-500 hover:bg-gray-200 hover:text-gray-700')
        ->add('dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-gray-200');

    $inputClasses = Ui::classes()
        ->add('h-7 min-w-20 flex-1 border-0 bg-transparent p-0 px-1 text-sm outline-none')
        ->add('text-gray-900 placeholder-gray-400')
        ->add('dark:text-gray-100 dark:placeholder-gray-500')
        ->when($size === 'sm', 'h-5 text-xs')
        ->when($size === 'lg', 'h-9 text-base');
@endphp

<div x-data="{
    tags: @js($tagsArray),
    newTag: '',
    addTag() {
        const value = this.newTag.trim();
        if (value && !this.tags.includes(value)) {
            this.tags.push(value);
            this.dispatchChange();
        }
        this.newTag = '';
    },
    removeTag(index) {
        this.tags.splice(index, 1);
        this.dispatchChange();
    },
    handleKeydown(event) {
        if ((event.key === 'Enter' || event.key === 'Tab' || event.key === ',') && this.newTag.trim()) {
            event.preventDefault();
            this.addTag();
        }
        if (event.key === 'Backspace' && !this.newTag && this.tags.length > 0) {
            this.removeTag(this.tags.length - 1);
        }
    },
    dispatchChange() {
        this.$nextTick(() => {
            this.$refs.hidden.dispatchEvent(new Event('input', { bubbles: true }));
            this.$dispatch('tags:change', { tags: this.tags });
        });
    },
}" x-on:click="$refs.input.focus()" class="{{ $containerClasses }}"
    {{ $attributes->except('class') }} data-input-tags>
    <template x-for="(tag, index) in tags" :key="index">
        <span class="{{ $tagClasses }}" x-bind:data-value="tag">
            <span x-text="tag"></span>

            <button type="button" class="{{ $removeClasses }}" x-on:click.stop="removeTag(index)"
                @disabled($disabled)>
                <ui:icon name="x" class="size-3" />
            </button>
        </span>
    </template>

    <input type="hidden" x-ref="hidden" name="{{ $name }}" x-bind:value="JSON.stringify(tags)"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.defer']) }} />

    <input type="text" x-ref="input" x-model="newTag" x-on:keydown="handleKeydown" x-on:blur="addTag()"
        placeholder="{{ $resolvedPlaceholder }}" class="{{ $inputClasses }}" @disabled($disabled) />
</div>
