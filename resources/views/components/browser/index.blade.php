@props([
    'height' => '600px',
    'src' => null,
    'title' => null,
])

@php
    $classes = UI::classes()
        ->add('overflow-hidden rounded-lg border border-gray-120 bg-gray-40')
        ->add('dark:border-gray-690 dark:bg-gray-830')
        ->merge($attributes);

    $headerClasses = UI::classes()
        ->add('flex items-center gap-3 px-4 py-3');

    $dotClasses = UI::classes()
        ->add('size-3 rounded-full');

    $titleClasses = UI::classes()
        ->add('flex-1 truncate text-center text-xs text-gray-500')
        ->add('dark:text-gray-400');

    $bodyClasses = UI::classes()
        ->add('px-4 pb-4');

    $contentClasses = UI::classes()
        ->add('w-full overflow-auto rounded-md border')
        ->add('bg-white border-gray-80')
        ->add('dark:border-gray-720 dark:bg-gray-800');

    $iframeClasses = UI::classes()
        ->add('w-full rounded-md border')
        ->add('bg-white border-gray-80')
        ->add('dark:border-gray-720 dark:bg-gray-800');
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-browser>
    <header class="{{ $headerClasses }}" data-browser-header>
        <div class="flex gap-1.5" data-browser-dots>
            <span class="{{ $dotClasses }} bg-red-400"></span>
            <span class="{{ $dotClasses }} bg-yellow-400"></span>
            <span class="{{ $dotClasses }} bg-green-400"></span>
        </div>

        @if ($title)
            <span class="{{ $titleClasses }}" data-browser-title>{{ $title }}</span>
        @endif
    </header>

    <div class="{{ $bodyClasses }}" data-browser-body>
        @if ($src)
            <iframe
                src="{{ $src }}"
                class="{{ $iframeClasses }}"
                style="height: {{ $height }}"
                data-browser-iframe
            ></iframe>
        @else
            <div class="{{ $contentClasses }}" style="height: {{ $height }}" data-browser-content>
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
