@props([
    'deletable' => true,
    'name' => null,
    'src' => null,
    'type' => null,
])

@php
    // Detect file type from extension or explicit type
    $extension = $src ? strtolower(pathinfo($src, PATHINFO_EXTENSION)) : null;
    $mimeType =
        $type ??
        match ($extension) {
            'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp' => 'image',
            'pdf' => 'pdf',
            'doc', 'docx' => 'word',
            'xls', 'xlsx' => 'excel',
            'ppt', 'pptx' => 'powerpoint',
            'zip', 'rar', '7z', 'tar', 'gz' => 'archive',
            'mp4', 'mov', 'avi', 'wmv', 'webm' => 'video',
            'mp3', 'wav', 'ogg', 'flac' => 'audio',
            'txt', 'md', 'rtf' => 'text',
            'csv' => 'csv',
            'json', 'xml' => 'code',
            default => 'file',
        };

    $isImage = $mimeType === 'image';

    $fileIcon = match ($mimeType) {
        'pdf' => 'file-text',
        'word' => 'file-text',
        'excel' => 'file-spreadsheet',
        'powerpoint' => 'file-presentation',
        'archive' => 'file-archive',
        'video' => 'file-video',
        'audio' => 'file-audio',
        'text' => 'file-text',
        'csv' => 'file-spreadsheet',
        'code' => 'file-code',
        default => 'file',
    };

    $classes = Ui::classes()->add('group relative')->merge($attributes->only('class'));

    $tileBaseClasses =
        'flex size-24 items-center justify-center rounded-lg border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-800';

    $deleteClasses = Ui::classes()
        ->add(
            'group/delete absolute -top-2 -right-2 flex size-6 cursor-pointer items-center justify-center rounded-full border shadow-sm transition-colors',
        )
        ->add('border-gray-200 bg-white hover:border-red-300 hover:bg-red-50')
        ->add('dark:border-gray-600 dark:bg-gray-700 dark:hover:border-red-500/50 dark:hover:bg-red-900/30');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} x-data="{ lightboxOpen: false }" data-file-upload-item>
    @if ($isImage)
        <button type="button" class="{{ $tileBaseClasses }} relative cursor-pointer overflow-hidden"
            x-on:click="lightboxOpen = true">
            <img src="{{ $src }}" alt="{{ $name }}" class="size-full object-cover" />

            <div
                class="absolute inset-0 flex items-center justify-center bg-black/0 opacity-0 transition-all group-hover:bg-black/30 group-hover:opacity-100">
                <ui:icon name="maximize-2" class="size-5 text-white" />
            </div>
        </button>
    @else
        <div class="{{ $tileBaseClasses }} flex-col gap-1 p-2">
            <ui:icon :name="$fileIcon" class="size-6 text-gray-400 dark:text-gray-500" />

            <span class="w-full truncate text-center text-xs text-gray-500 dark:text-gray-400">
                {{ $name }}
            </span>
        </div>
    @endif

    @if ($deletable)
        <button type="button" class="{{ $deleteClasses }}" {{ $attributes->whereStartsWith('x-on:delete') }}>
            <ui:icon name="x"
                class="size-3.5 text-gray-500 transition-colors group-hover/delete:text-red-500 dark:text-gray-400 dark:group-hover/delete:text-red-400" />
        </button>
    @endif

    @if ($isImage)
        <template x-teleport="body">
            <div x-show="lightboxOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4 backdrop-blur-sm"
                x-on:click="lightboxOpen = false" x-on:keydown.escape.window="lightboxOpen = false" x-cloak>
                <button type="button"
                    class="absolute top-4 right-4 flex size-10 items-center justify-center rounded-full bg-white/10 transition-colors hover:bg-white/20"
                    x-on:click.stop="lightboxOpen = false">
                    <ui:icon name="x" class="size-6 text-white" />
                </button>

                <div class="flex max-h-[90vh] max-w-[90vw] flex-col items-center gap-4" x-on:click.stop>
                    <img src="{{ $src }}" alt="{{ $name }}"
                        class="max-h-[80vh] max-w-full rounded-lg object-contain shadow-2xl" />

                    @if ($name)
                        <p class="text-sm text-white/80">{{ $name }}</p>
                    @endif
                </div>
            </div>
        </template>
    @endif
</div>
