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
        display: '',
        wireModel: @js($name),

        strip(v) { return v ? v.replace(/^#/, '') : ''; },
        withHash(v) { let s = this.strip(v); return s ? '#' + s : ''; },

        init() {
            let raw = (this.$wire ? this.$wire.get(this.wireModel) : null) || '{{ $placeholder }}';
            this.display = this.strip(raw);
            this.color = this.withHash(raw);
        },

        sync() {
            if (this.$wire && this.wireModel) {
                this.$wire.set(this.wireModel, this.color);
            }
        },

        openPicker() {
            this.$refs.picker.click();
        },

        onPickerInput(e) {
            this.color = e.target.value;
            this.display = this.strip(this.color);
            this.sync();
        },

        onDisplayInput() {
            this.display = this.display.replace(/[^0-9a-fA-F]/g, '');
            this.color = this.withHash(this.display);
            this.sync();
        },
    }"
>
    <flux:input.group>
        <flux:input.group.prefix>#</flux:input.group.prefix>

        <flux:input
            x-model="display"
            x-on:input="onDisplayInput()"
            :invalid="$invalid"
            :size="$size"
            :placeholder="ltrim($placeholder, '#')"
            maxlength="6"
        />

        <div class="flex items-center rounded-e-lg border-y border-e border-zinc-200 px-2 dark:border-white/10">
            <div
                x-ref="swatch"
                class="size-6 cursor-pointer rounded"
                :style="'background-color:' + color"
                x-on:click="openPicker()"
            ></div>
        </div>
    </flux:input.group>

    {{-- Hidden native color picker, positioned at right end --}}
    <input
        x-ref="picker"
        type="color"
        :value="color"
        x-on:input="onPickerInput($event)"
        class="invisible absolute right-0 top-full h-0 w-0"
        tabindex="-1"
        aria-hidden="true"
    >
</div>
