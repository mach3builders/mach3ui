@props([
    'href' => null,
    'label' => null,
])

@php
    $anchorId = $href && str_starts_with($href, '#') ? substr($href, 1) : null;

    $classes = Ui::classes()->add('-ml-px border-l py-1 pl-4 text-[13px] leading-relaxed transition-colors');

    $inactiveClasses = Ui::classes()
        ->add('border-gray-150 text-gray-500 hover:text-gray-900')
        ->add('dark:border-gray-700 dark:text-gray-400 dark:hover:text-gray-200');

    $activeClasses = Ui::classes()
        ->add('border-gray-900 text-gray-900')
        ->add('dark:border-gray-200 dark:text-gray-200');
@endphp

<a class="{{ $classes }}" href="{{ $href }}"
    :class="activeId === '{{ $anchorId }}' ? '{{ $activeClasses }}' : '{{ $inactiveClasses }}'" data-nav-item>
    <span class="flex-1">{{ $label ?? $slot }}</span>
</a>
