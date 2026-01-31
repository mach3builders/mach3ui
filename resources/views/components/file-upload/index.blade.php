@props([
    'accept' => 'image/*',
    'multiple' => false,
    'placeholder' => null,
])

@php
    $resolvedPlaceholder = $placeholder ?? __('ui::ui.file_upload.placeholder');
    $hintText = $multiple ? __('ui::ui.file_upload.multiple') : __('ui::ui.file_upload.single');
@endphp

<div x-data="{
    files: [],
    dragover: false,
    lightboxOpen: false,
    lightboxSrc: '',
    lightboxName: '',
    _syncing: false,
    handleFiles(fileList) {
        if (this._syncing) return;
        const newFiles = Array.from(fileList).map(file => ({
            file,
            name: file.name,
            size: file.size,
            type: file.type,
            preview: file.type.startsWith('image/') ? URL.createObjectURL(file) : null
        }));
        @if($multiple)
        this.files = [...this.files, ...newFiles];
        @else
        this.files = newFiles.slice(0, 1);
        @endif
        this.updateInput();
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
    formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / 1048576).toFixed(1) + ' MB';
    },
    openLightbox(src, name) {
        this.lightboxSrc = src;
        this.lightboxName = name;
        this.lightboxOpen = true;
    },
    closeLightbox() {
        this.lightboxOpen = false;
        this.lightboxSrc = '';
        this.lightboxName = '';
    }
}" class="{{ Ui::classes()->add('flex flex-col gap-3')->merge($attributes->only('class')) }}"
    {{ $attributes->except('class') }} data-file-upload>
    <div class="relative flex min-h-32 cursor-pointer flex-col items-center justify-center gap-2 rounded-lg border-2 border-dashed p-6 transition-colors border-gray-140 bg-white hover:border-gray-400 hover:bg-gray-20 dark:border-gray-700 dark:bg-gray-800 dark:hover:border-gray-600 dark:hover:bg-gray-820"
        :class="{ 'border-blue-500! bg-blue-50! dark:bg-blue-900/20!': dragover }"
        x-on:dragover.prevent="dragover = true" x-on:dragleave.prevent="dragover = false"
        x-on:drop.prevent="dragover = false; handleFiles($event.dataTransfer.files)" x-on:click="$refs.input.click()">
        <ui:icon name="upload" class="size-8 text-gray-400 dark:text-gray-500" />

        <p class="text-center text-sm text-gray-500 dark:text-gray-400">{{ $resolvedPlaceholder }}</p>

        <p class="text-center text-xs text-gray-400 dark:text-gray-500">{{ $hintText }}</p>

        <input type="file" x-ref="input" {{ $attributes->except('class') }} accept="{{ $accept }}"
            @if ($multiple) multiple @endif class="sr-only"
            x-on:change="handleFiles($event.target.files)" />
    </div>

    <template x-if="files.length > 0">
        <div class="flex flex-wrap gap-3">
            <template x-for="(item, index) in files" :key="index">
                <div class="group relative">
                    <template x-if="item.preview">
                        <button type="button"
                            class="relative flex size-24 cursor-pointer items-center justify-center overflow-hidden rounded-lg border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-800"
                            x-on:click="openLightbox(item.preview, item.name)">
                            <img :src="item.preview" :alt="item.name" class="size-full object-cover" />

                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/0 opacity-0 transition-all group-hover:bg-black/30 group-hover:opacity-100">
                                <ui:icon name="maximize-2" class="size-5 text-white" />
                            </div>
                        </button>
                    </template>

                    <template x-if="!item.preview">
                        <div
                            class="flex size-24 flex-col items-center justify-center gap-1 rounded-lg border border-gray-200 bg-gray-100 p-2 dark:border-gray-700 dark:bg-gray-800">
                            <ui:icon name="file" class="size-6 text-gray-400 dark:text-gray-500" />

                            <span class="w-full truncate text-center text-xs text-gray-500 dark:text-gray-400"
                                x-text="item.name"></span>
                        </div>
                    </template>

                    <button type="button"
                        class="absolute -top-2 -right-2 flex size-6 items-center justify-center rounded-full border bg-white shadow-sm transition-colors hover:bg-red-50 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-red-900/30"
                        x-on:click.stop="removeFile(index)">
                        <ui:icon name="x"
                            class="size-3.5 text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400" />
                    </button>
                </div>
            </template>
        </div>
    </template>

    <template x-teleport="body">
        <div x-show="lightboxOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4 backdrop-blur-sm"
            x-on:click="closeLightbox()" x-on:keydown.escape.window="closeLightbox()" x-cloak>
            <button type="button"
                class="absolute top-4 right-4 flex size-10 items-center justify-center rounded-full bg-white/10 transition-colors hover:bg-white/20"
                x-on:click.stop="closeLightbox()">
                <ui:icon name="x" class="size-6 text-white" />
            </button>

            <div class="flex max-h-[90vh] max-w-[90vw] flex-col items-center gap-4" x-on:click.stop>
                <img :src="lightboxSrc" :alt="lightboxName"
                    class="max-h-[80vh] max-w-full rounded-lg object-contain shadow-2xl" />

                <p class="text-sm text-white/80" x-text="lightboxName"></p>
            </div>
        </div>
    </template>
</div>
