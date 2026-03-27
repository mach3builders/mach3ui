@props([
    'name' => null,
    'invalid' => null,
    'size' => null,
    'placeholder' => '#000000',
])

@php
$showName = isset($name);

if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$invalid ??= ($name && $errors->has($name));
@endphp

<div
    {{ $attributes->except(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.lazy', 'wire:model.debounce'])->only('class') }}
    data-flux-color-picker
    class="relative"
    x-data="{
        color: '',

        init() {
            this.color = this.$refs.input.value || '{{ $placeholder }}';

            this.$watch('color', (value) => {
                this.$refs.swatch.style.backgroundColor = value;
            });

            this.$refs.swatch.style.backgroundColor = this.color;
        },

        openPicker() {
            this.$refs.picker.click();
        },

        onPickerInput(e) {
            this.color = e.target.value;
            this.$refs.input.value = this.color;
            this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
        },

        onInput(e) {
            this.color = e.target.value;
        },
    }"
>
    <flux:input
        x-ref="input"
        x-on:input="onInput($event)"
        :name="$showName ? $name : null"
        :invalid="$invalid"
        :size="$size"
        :placeholder="$placeholder"
        {{ $attributes->only(['wire:model', 'wire:model.live', 'wire:model.blur', 'wire:model.lazy', 'wire:model.debounce']) }}
    >
        <x-slot:iconTrailing>
            <div class="-mr-1 flex items-center gap-1">
                <div
                    x-ref="swatch"
                    class="size-6 cursor-pointer rounded border border-zinc-300 dark:border-white/20"
                    x-on:click="openPicker()"
                ></div>

                <flux:button size="sm" variant="subtle" icon="swatch" x-on:click="openPicker()" square />
            </div>
        </x-slot:iconTrailing>
    </flux:input>

    {{-- Hidden native color picker, positioned at end --}}
    <input
        x-ref="picker"
        type="color"
        :value="color"
        x-on:input="onPickerInput($event)"
        class="invisible absolute right-0 top-0 h-0 w-0"
        tabindex="-1"
        aria-hidden="true"
    >
</div>
