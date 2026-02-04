@props(['label', 'value' => null])

@php
    $classes = Ui::classes()->add('flex items-baseline gap-2')->merge($attributes);

    $labelClasses = Ui::classes()->add('shrink-0 text-gray-500 dark:text-gray-400');

    $dividerClasses = Ui::classes()->add('flex-1 border-b border-dotted border-gray-300 dark:border-gray-600');

    $valueClasses = Ui::classes()->add('text-right font-medium text-gray-900 dark:text-white');
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-definition-list-item>
    <dt class="{{ $labelClasses }}" data-definition-list-label>{{ $label }}</dt>
    <span class="{{ $dividerClasses }}" data-definition-list-divider aria-hidden="true"></span>
    <dd class="{{ $valueClasses }}" data-definition-list-value>{{ $value ?? $slot }}</dd>
</div>
