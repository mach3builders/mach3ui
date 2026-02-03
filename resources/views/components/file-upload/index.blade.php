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
    $id = $attributes->get('id') ?? ($id ?? ($inputName ?? 'file-upload-' . Str::random(8)));

    $error = $inputName ? $errors->first($inputName) ?? null : null;

    $resolvedPlaceholder = $placeholder ?? __('Drop files here or click to upload');
    $dropzoneHint = $hint ?? ($multiple ? __('You can select multiple files') : __('Select a file'));

    $previewSlot = $__laravel_slots['preview'] ?? null;

    $wrapperClasses = Ui::classes()
        ->add('flex flex-col gap-3')
        ->merge($attributes->only('class'));

    $dropzoneClasses = Ui::classes()
        ->add('group/dropzone relative flex min-h-32 cursor-pointer flex-col items-center justify-center gap-2 rounded-lg border-2 border-dashed p-6 transition-colors')
        ->add('border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50')
        ->add('dark:border-gray-700 dark:bg-gray-800 dark:hover:border-gray-600 dark:hover:bg-gray-750')
        ->when((bool) $error, 'border-red-500 dark:border-red-500');

    $tileClasses = Ui::classes()
        ->add('flex size-24 items-center justify-center rounded-lg border')
        ->add('border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-800');

    $deleteClasses = Ui::classes()
        ->add('group/delete absolute -top-2 -right-2 flex size-6 cursor-pointer items-center justify-center rounded-full border shadow-sm transition-colors')
        ->add('border-gray-200 bg-white hover:border-red-300 hover:bg-red-50')
        ->add('dark:border-gray-600 dark:bg-gray-700 dark:hover:border-red-500/50 dark:hover:bg-red-900/30');
@endphp

<div
    x-data="{
        dragover: false,
        files: [],
        lightboxName: '',
        lightboxOpen: false,
        lightboxSrc: '',
        _syncing: false,

        closeLightbox() {
            this.lightboxOpen = false;
            this.lightboxSrc = '';
            this.lightboxName = '';
        },

        handleFiles(fileList) {
            if (this._syncing) return;

            const newFiles = Array.from(fileList).map(file => ({
                file,
                name: file.name,
                preview: file.type.startsWith('image/') ? URL.createObjectURL(file) : null,
                size: file.size,
                type: file.type,
            }));

            @if($multiple)
            this.files = [...this.files, ...newFiles];
            @else
            this.files = newFiles.slice(0, 1);
            @endif

            this.updateInput();
        },

        openLightbox(src, name) {
            this.lightboxSrc = src;
            this.lightboxName = name;
            this.lightboxOpen = true;
        },

        removeFile(index) {
            if (this.files[index]?.preview) {
                URL.revokeObjectURL(this.files[index].preview);
            }
            this.files.splice(index, 1);
            this.updateInput();
        },

        updateInput() {
            this._syncing = true;
            const dt = new DataTransfer();
            this.files.forEach(f => dt.items.add(f.file));
            this.$refs.input.files = dt.files;
            this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));
            this._syncing = false;
        },
    }"
    class="{{ $wrapperClasses }}"
    {{ $attributes->only('data-*') }}
    data-file-upload
    data-control
>
    {{-- Existing files preview slot --}}
    @if ($previewSlot)
        <div class="flex flex-wrap gap-3" data-file-upload-preview>
            {{ $previewSlot }}
        </div>
    @endif

    {{-- Label --}}
    @if ($label)
        <ui:label :for="$id">{{ $label }}</ui:label>
    @endif

    {{-- Dropzone --}}
    <div
        class="{{ $dropzoneClasses }}"
        :class="{ '!border-blue-500 !bg-blue-50 dark:!bg-blue-900/20': dragover }"
        x-on:click="$refs.input.click()"
        x-on:dragover.prevent="dragover = true"
        x-on:dragleave.prevent="dragover = false"
        x-on:drop.prevent="dragover = false; handleFiles($event.dataTransfer.files)"
        data-file-upload-dropzone
    >
        <ui:icon name="upload" class="size-8 text-gray-400 group-hover/dropzone:text-gray-500 dark:text-gray-500 dark:group-hover/dropzone:text-gray-400" />

        <p class="text-center text-sm text-gray-500 dark:text-gray-400">
            {{ $resolvedPlaceholder }}
        </p>

        <p class="text-center text-xs text-gray-400 dark:text-gray-500">
            {{ $dropzoneHint }}
        </p>

        <input
            x-ref="input"
            type="file"
            class="sr-only"
            id="{{ $id }}"
            @if ($inputName) name="{{ $inputName }}{{ $multiple ? '[]' : '' }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            @if ($multiple) multiple @endif
            @if ($error) aria-invalid="true" @endif
            x-on:change="handleFiles($event.target.files)"
            {{ $attributes->except(['class', 'id', 'name', 'accept', 'multiple', 'data-*']) }}
        >
    </div>

    {{-- New files preview --}}
    <template x-if="files.length > 0">
        <div class="flex flex-wrap gap-3" data-file-upload-files>
            <template x-for="(item, index) in files" :key="index">
                <div class="group relative">
                    {{-- Image preview --}}
                    <template x-if="item.preview">
                        <button
                            type="button"
                            class="{{ $tileClasses }} relative cursor-pointer overflow-hidden"
                            x-on:click="openLightbox(item.preview, item.name)"
                        >
                            <img :src="item.preview" :alt="item.name" class="size-full object-cover">

                            <div class="absolute inset-0 flex items-center justify-center bg-black/0 opacity-0 transition-all group-hover:bg-black/30 group-hover:opacity-100">
                                <ui:icon name="maximize-2" class="size-5 text-white" />
                            </div>
                        </button>
                    </template>

                    {{-- File preview --}}
                    <template x-if="!item.preview">
                        <div class="{{ $tileClasses }} flex-col gap-1 p-2">
                            <ui:icon name="file" class="size-6 text-gray-400 dark:text-gray-500" />
                            <span
                                class="w-full truncate text-center text-xs text-gray-500 dark:text-gray-400"
                                x-text="item.name"
                            ></span>
                        </div>
                    </template>

                    {{-- Delete button --}}
                    <button type="button" class="{{ $deleteClasses }}" x-on:click.stop="removeFile(index)">
                        <ui:icon
                            name="x"
                            class="size-3.5 text-gray-500 transition-colors group-hover/delete:text-red-500 dark:text-gray-400 dark:group-hover/delete:text-red-400"
                        />
                    </button>
                </div>
            </template>
        </div>
    </template>

    {{-- Error --}}
    @if ($inputName)
        <ui:error :name="$inputName" />
    @endif

    {{-- Lightbox --}}
    <template x-teleport="body">
        <div
            x-show="lightboxOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4 backdrop-blur-sm"
            x-on:click="closeLightbox()"
            x-on:keydown.escape.window="lightboxOpen && closeLightbox()"
            x-cloak
        >
            <button
                type="button"
                class="absolute top-4 right-4 flex size-10 items-center justify-center rounded-full bg-white/10 transition-colors hover:bg-white/20"
                x-on:click.stop="closeLightbox()"
            >
                <ui:icon name="x" class="size-6 text-white" />
            </button>

            <div class="flex max-h-[90vh] max-w-[90vw] flex-col items-center gap-4" x-on:click.stop>
                <img
                    :src="lightboxSrc"
                    :alt="lightboxName"
                    class="max-h-[80vh] max-w-full rounded-lg object-contain shadow-2xl"
                >

                <p class="text-sm text-white/80" x-text="lightboxName"></p>
            </div>
        </div>
    </template>
</div>
