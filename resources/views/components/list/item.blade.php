@props([
    'href' => null,
    'icon' => null,
    'label' => null,
    'value' => null,
])

@php
    $tag = $href ? 'a' : 'div';
    $hasLabelValue = $label || $value || $icon;

    $classes = Ui::classes()
        ->add('border-b px-4.5 py-3.5')
        ->add('border-gray-60 text-gray-700')
        ->add('dark:border-gray-740 dark:text-gray-200')
        ->add('last:border-b-0')
        ->when($href, 'cursor-pointer hover:bg-gray-20 dark:hover:bg-gray-780')
        ->when($hasLabelValue, 'flex items-center justify-between gap-4');
@endphp

<{{ $tag }} {{ $attributes->class($classes) }}
    @if ($href) href="{{ $href }}" @endif data-list-item>
    @if ($hasLabelValue)
        <span class="flex items-center gap-3 font-medium text-gray-900 dark:text-white">
            @if ($icon)
                <ui:icon :name="$icon" size="sm" class="text-gray-400 dark:text-gray-500" />
            @endif

            {{ $label ?? $slot }}
        </span>

        @if ($value)
            <span class="text-right text-gray-500 dark:text-gray-400">{{ $value }}</span>
        @endif
    @else
        {{ $slot }}
    @endif
    </{{ $tag }}>
