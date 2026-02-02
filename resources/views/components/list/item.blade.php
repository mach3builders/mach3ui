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

    $labelClasses = Ui::classes()
        ->add('flex items-center gap-3 font-medium')
        ->add('text-gray-900')
        ->add('dark:text-white');

    $valueClasses = Ui::classes()->add('text-right')->add('text-gray-500')->add('dark:text-gray-400');

    $iconClasses = Ui::classes()->add('text-gray-400')->add('dark:text-gray-500');
@endphp

<{{ $tag }} {{ $attributes->class($classes) }}
    @if ($href) href="{{ $href }}" @endif data-list-item>
    @if ($hasLabelValue)
        <span class="{{ $labelClasses }}">
            @if ($icon)
                <ui:icon :name="$icon" size="sm" :class="$iconClasses" />
            @endif

            {{ $label ?? $slot }}
        </span>

        @if ($value)
            <span class="{{ $valueClasses }}">{{ $value }}</span>
        @endif
    @else
        {{ $slot }}
    @endif
    </{{ $tag }}>
