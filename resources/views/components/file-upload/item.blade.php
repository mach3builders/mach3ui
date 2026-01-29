@props([
    'deletable' => true,
    'name' => null,
    'src' => null,
])

@php
    $is_image = $src && preg_match('/\.(jpg|jpeg|png|gif|webp|svg|bmp)$/i', $src);
@endphp

<div
    {{ $attributes->class(['group relative']) }}
    x-data="{ lightboxOpen: false }"
>
    @if ($is_image)
        <button
            type="button"
            class="relative flex size-24 cursor-pointer items-center justify-center overflow-hidden rounded-lg border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-800"
            x-on:click="lightboxOpen = true"
        >
            <img src="{{ $src }}" alt="{{ $name }}" class="size-full object-cover" />

            <div class="absolute inset-0 flex items-center justify-center bg-black/0 opacity-0 transition-all group-hover:bg-black/30 group-hover:opacity-100">
                <ui:icon name="maximize-2" class="size-5 text-white" />
            </div>
        </button>
    @else
        <div class="flex size-24 flex-col items-center justify-center gap-1 rounded-lg border border-gray-200 bg-gray-100 p-2 dark:border-gray-700 dark:bg-gray-800">
            <ui:icon name="file" class="size-6 text-gray-400 dark:text-gray-500" />

            <span class="w-full truncate text-center text-xs text-gray-500 dark:text-gray-400">{{ $name }}</span>
        </div>
    @endif

    @if ($deletable)
        <button
            type="button"
            {{ $attributes->whereStartsWith('x-on:delete')->merge(['class' => 'absolute -top-2 -right-2 flex size-6 items-center justify-center rounded-full border bg-white shadow-sm transition-colors hover:bg-red-50 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-red-900/30']) }}
        >
            <ui:icon name="x" class="size-3.5 text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400" />
        </button>
    @endif

    @if ($is_image)
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
                x-on:click="lightboxOpen = false"
                x-on:keydown.escape.window="lightboxOpen = false"
                x-cloak
            >
                <button
                    type="button"
                    class="absolute top-4 right-4 flex size-10 items-center justify-center rounded-full bg-white/10 transition-colors hover:bg-white/20"
                    x-on:click.stop="lightboxOpen = false"
                >
                    <ui:icon name="x" class="size-6 text-white" />
                </button>

                <div class="flex max-h-[90vh] max-w-[90vw] flex-col items-center gap-4" x-on:click.stop>
                    <img src="{{ $src }}" alt="{{ $name }}" class="max-h-[80vh] max-w-full rounded-lg object-contain shadow-2xl" />

                    @if ($name)
                        <p class="text-sm text-white/80">{{ $name }}</p>
                    @endif
                </div>
            </div>
        </template>
    @endif
</div>
