@props([
    'height' => '600px',
    'src' => null,
    'title' => null,
])

@php
    $classes = Ui::classes()
        ->add('overflow-hidden rounded-lg border')
        ->add('border-gray-100 bg-gray-20')
        ->add('dark:border-gray-740 dark:bg-gray-820')
        ->merge($attributes->only('class'));

    $headerClasses = Ui::classes()->add('flex items-center gap-3 px-4 py-3');
    $dotClasses = Ui::classes()->add('size-3 rounded-full');

    $titleClasses = Ui::classes()->add('flex-1 text-xs text-gray-500')->add('dark:text-gray-400');

    $bodyClasses = Ui::classes()->add('px-4 pb-4');

    $contentClasses = Ui::classes()->add('w-full overflow-auto rounded-md bg-white')->add('dark:bg-gray-800');

    $iframeClasses = Ui::classes()->add('w-full rounded-md border-0 bg-white')->add('dark:bg-gray-800');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-browser>
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
            <iframe src="{{ $src }}" class="{{ $iframeClasses }}" style="height: {{ $height }}"
                data-browser-iframe></iframe>
        @else
            <div class="{{ $contentClasses }}" style="height: {{ $height }}" data-browser-content>
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
