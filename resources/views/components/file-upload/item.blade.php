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
            'bmp', 'gif', 'jpeg', 'jpg', 'png', 'svg', 'webp' => 'image',
            'pdf' => 'pdf',
            'doc', 'docx' => 'word',
            'xls', 'xlsx' => 'excel',
            'ppt', 'pptx' => 'powerpoint',
            '7z', 'gz', 'rar', 'tar', 'zip' => 'archive',
            'avi', 'mov', 'mp4', 'webm', 'wmv' => 'video',
            'flac', 'mp3', 'ogg', 'wav' => 'audio',
            'md', 'rtf', 'txt' => 'text',
            'csv' => 'csv',
            'json', 'xml' => 'code',
            default => 'file',
        };

    $isImage = $mimeType === 'image';

    $fileIcon = match ($mimeType) {
        'archive' => 'archive',
        'audio' => 'music',
        'code' => 'file-code',
        'csv' => 'table',
        'excel' => 'file-spreadsheet',
        'pdf', 'text', 'word' => 'file-text',
        'powerpoint' => 'presentation',
        'video' => 'video',
        default => 'file',
    };

    $wrapperClasses = Ui::classes()->add('group relative')->merge($attributes->only('class'));

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

<div class="{{ $wrapperClasses }}" {{ $attributes->except('class') }} x-data="{ lightboxOpen: false }" data-file-upload-item>
    @if ($isImage)
        <button type="button" class="{{ $tileClasses }} relative cursor-pointer overflow-hidden"
            x-on:click="lightboxOpen = true">
            <img src="{{ $src }}" alt="{{ $name }}" class="size-full object-cover">

            <div
                class="absolute inset-0 flex items-center justify-center bg-black/0 opacity-0 group-hover:bg-black/30 group-hover:opacity-100">
                <ui:icon name="maximize-2" class="size-5 text-white" />
            </div>
        </button>
    @else
        <div class="{{ $tileClasses }} flex-col gap-1 p-2">
            <ui:icon :name="$fileIcon" class="size-6 text-gray-400 dark:text-gray-500" />

            <span class="w-full truncate text-center text-xs text-gray-500 dark:text-gray-400">
                {{ $name }}
            </span>
        </div>
    @endif

    @if ($deletable)
        <button type="button" class="{{ $deleteClasses }}"
            {{ $attributes->whereStartsWith(['x-on:delete', '@delete', 'wire:click']) }}>
            <ui:icon name="x"
                class="size-3.5 text-gray-500 group-hover/delete:text-red-500 dark:text-gray-400 dark:group-hover/delete:text-red-400" />
        </button>
    @endif

    @if ($isImage)
        <template x-teleport="body">
            <div x-show="lightboxOpen"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4 backdrop-blur-sm"
                x-on:click="lightboxOpen = false" x-on:keydown.escape.window="lightboxOpen && (lightboxOpen = false)"
                x-cloak>
                <button type="button"
                    class="absolute top-4 right-4 flex size-10 items-center justify-center rounded-full bg-white/10 hover:bg-white/20"
                    x-on:click.stop="lightboxOpen = false">
                    <ui:icon name="x" class="size-6 text-white" />
                </button>

                <div class="flex max-h-[90vh] max-w-[90vw] flex-col items-center gap-4" x-on:click.stop>
                    <img src="{{ $src }}" alt="{{ $name }}"
                        class="max-h-[80vh] max-w-full rounded-lg object-contain shadow-2xl">

                    @if ($name)
                        <p class="text-sm text-white/80">{{ $name }}</p>
                    @endif
                </div>
            </div>
        </template>
    @endif
</div>
