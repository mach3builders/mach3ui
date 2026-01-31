@props([
    'code' => null,
    'height' => '600px',
    'src' => null,
    'title' => null,
])

@php
    $classes = Ui::classes()
        ->add('overflow-hidden rounded-lg border')
        ->add('border-gray-100 bg-gray-10')
        ->add('dark:border-gray-700 dark:bg-gray-800');

    $headerClasses = Ui::classes()->add('flex items-center gap-3 px-4 py-3');
    $dotClasses = Ui::classes()->add('size-3 rounded-full');

    $titleClasses = Ui::classes()->add('flex-1 text-xs text-gray-500')->add('dark:text-gray-400');

    $copyButtonClasses = Ui::classes()
        ->add('text-gray-400 transition-colors hover:text-gray-600')
        ->add('dark:text-gray-500 dark:hover:text-gray-300');

    $copyIconClasses = Ui::classes()->add('size-4');

    $contentClasses = Ui::classes()->add('w-full overflow-auto rounded-md bg-white')->add('dark:bg-gray-900');
@endphp

<div @if ($code) x-data="{ copied: false, code: {{ Js::from($code) }} }" @endif
    {{ $attributes->class($classes) }} data-browser>
    <header class="{{ $headerClasses }}" data-browser-header>
        <div class="flex gap-1.5">
            <span class="{{ $dotClasses }} bg-red-400"></span>
            <span class="{{ $dotClasses }} bg-yellow-400"></span>
            <span class="{{ $dotClasses }} bg-green-400"></span>
        </div>

        @if ($title)
            <span class="{{ $titleClasses }}" data-browser-title>{{ $title }}</span>
        @elseif ($code)
            <span class="flex-1"></span>
        @endif

        @if ($code)
            <button type="button"
                x-on:click="navigator.clipboard.writeText(code); copied = true; setTimeout(() => copied = false, 2000)"
                class="{{ $copyButtonClasses }}">
                <ui:icon x-show="!copied" name="copy" :class="$copyIconClasses" />
                <ui:icon x-show="copied" x-cloak name="check" :class="$copyIconClasses" class="text-green-500" />
            </button>
        @endif
    </header>

    <div class="px-4 pb-4">
        @if ($src)
            <iframe src="{{ $src }}" class="w-full rounded-md border-0 bg-white"
                style="height: {{ $height }}"></iframe>
        @else
            <div class="{{ $contentClasses }}" style="height: {{ $height }}" data-browser-content>
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
