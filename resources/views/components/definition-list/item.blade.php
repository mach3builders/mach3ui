@props(['term', 'value' => null])

@php
    $classes = Ui::classes()->add('flex items-baseline gap-2')->merge($attributes->only('class'));

    $termClasses = Ui::classes()->add('shrink-0')->add('text-gray-500')->add('dark:text-gray-400');

    $dividerClasses = Ui::classes()
        ->add('flex-1 border-b border-dotted')
        ->add('border-gray-300')
        ->add('dark:border-gray-600');

    $valueClasses = Ui::classes()->add('text-right font-medium')->add('text-gray-900')->add('dark:text-white');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-definition-list-item>
    <dt class="{{ $termClasses }}" data-definition-list-term>{{ $term }}</dt>
    <span class="{{ $dividerClasses }}" data-definition-list-divider></span>
    <dd class="{{ $valueClasses }}" data-definition-list-value>{{ $value ?? $slot }}</dd>
</div>
