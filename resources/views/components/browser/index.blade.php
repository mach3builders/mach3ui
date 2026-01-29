@props([
    'code' => null,
    'height' => '600px',
    'src' => null,
    'title' => null,
])

<div {{ $attributes->class([
    'overflow-hidden rounded-lg border',
    'border-gray-100 bg-gray-10',
    'dark:border-gray-700 dark:bg-gray-800',
]) }}
    data-browser @if ($code) x-data="{ copied: false, code: {{ Js::from($code) }} }" @endif>
    <header class="flex items-center gap-3 px-4 py-3">
        <div class="flex gap-1.5">
            <span class="h-3 w-3 rounded-full bg-red-400"></span>

            <span class="h-3 w-3 rounded-full bg-yellow-400"></span>

            <span class="h-3 w-3 rounded-full bg-green-400"></span>
        </div>

        @if ($title)
            <span class="flex-1 text-xs text-gray-500 dark:text-gray-400">{{ $title }}</span>
        @elseif ($code)
            <span class="flex-1"></span>
        @endif

        @if ($code)
            <button type="button"
                x-on:click="
                    navigator.clipboard.writeText(code);
                    copied = true;
                    setTimeout(() => copied = false, 2000);
                "
                class="text-gray-400 transition-colors hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300">
                <ui:icon x-show="!copied" name="copy" size="sm" />

                <ui:icon x-show="copied" x-cloak name="check" size="sm" class="text-green-500" />
            </button>
        @endif
    </header>

    <div class="px-4 pb-4">
        @if ($src)
            <iframe src="{{ $src }}" class="w-full rounded-md border-0 bg-white"
                style="height: {{ $height }}"></iframe>
        @else
            <div class="w-full overflow-auto rounded-md bg-white dark:bg-gray-900" style="height: {{ $height }}"
                data-browser-content>
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
