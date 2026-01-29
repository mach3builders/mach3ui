@props([
    'disabled' => false,
    'invalid' => false,
    'name' => 'tags',
    'placeholder' => 'Add a tag...',
    'size' => null,
    'tags' => [],
])

@php
    $tags_array = is_array($tags) ? $tags : (is_string($tags) ? json_decode($tags, true) ?? [] : []);

    $container_classes = [
        'flex min-h-10 w-full flex-wrap items-center gap-1.5 rounded-md border px-2 py-1.5 shadow-xs',
        'border-gray-140 bg-white',
        'dark:border-gray-700 dark:bg-gray-800',
        'focus-within:border-gray-400 focus-within:outline-none',
        'dark:focus-within:border-gray-640',
        'min-h-8 px-1.5 py-1 text-xs' => $size === 'sm',
        'min-h-12 px-3 py-2 text-base' => $size === 'lg',
        'cursor-not-allowed opacity-50' => $disabled,
        'border-red-500 focus-within:border-red-600 dark:border-red-500 dark:focus-within:border-red-500' => $invalid,
    ];

    $tag_classes = [
        'inline-flex cursor-default items-center gap-1 rounded px-2 py-0.5 text-sm font-medium select-none',
        'bg-gray-60 text-gray-700',
        'dark:bg-gray-740 dark:text-gray-200',
        'px-1.5 py-0 text-xs' => $size === 'sm',
        'px-2.5 py-1 text-base' => $size === 'lg',
    ];

    $remove_classes = [
        '-mr-0.5 ml-0.5 inline-flex size-4 shrink-0 cursor-pointer items-center justify-center rounded',
        'text-gray-500 hover:bg-gray-200 hover:text-gray-700',
        'dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-gray-200',
    ];

    $input_classes = [
        'h-7 min-w-20 flex-1 border-0 bg-transparent p-0 px-1 text-sm outline-none',
        'text-gray-900 placeholder-gray-400',
        'dark:text-gray-100 dark:placeholder-gray-500',
        'h-5 text-xs' => $size === 'sm',
        'h-9 text-base' => $size === 'lg',
    ];
@endphp

<div
    x-data="{
        tags: @js($tags_array),
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
    }"
    x-on:click="$refs.input.focus()"
    {{ $attributes->class($container_classes) }}
    data-input-tags
>
    <template x-for="(tag, index) in tags" :key="index">
        <span @class($tag_classes) x-bind:data-value="tag">
            <span x-text="tag"></span>

            <button
                type="button"
                @class($remove_classes)
                x-on:click.stop="removeTag(index)"
                @disabled($disabled)
            >
                <ui:icon name="x" class="size-3" />
            </button>
        </span>
    </template>

    <input
        type="hidden"
        x-ref="hidden"
        name="{{ $name }}"
        x-bind:value="JSON.stringify(tags)"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.defer']) }}
    />

    <input
        type="text"
        x-ref="input"
        x-model="newTag"
        x-on:keydown="handleKeydown"
        x-on:blur="addTag()"
        placeholder="{{ $placeholder }}"
        @class($input_classes)
        @disabled($disabled)
    />
</div>
