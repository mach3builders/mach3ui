@props([
    'active' => false,
    'disabled' => false,
    'href' => null,
    'noPadding' => false,
    'page' => null,
])

@php
    $tag = $href ? 'a' : 'button';

    $classes = Ui::classes()
        ->add('inline-flex h-9 min-w-9 cursor-pointer items-center justify-center gap-2 rounded-md border px-3 text-sm font-medium')
        ->add('[&_svg]:size-4 [&_svg]:shrink-0')
        ->add('bg-transparent text-gray-600')
        ->add('dark:text-gray-400')
        ->add(
            $active
                ? 'border-gray-120 bg-white text-gray-900 shadow-xs dark:border-gray-690 dark:bg-gray-800 dark:text-gray-20'
                : 'border-transparent hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-760 dark:hover:text-gray-100',
        )
        ->when($noPadding, 'px-0')
        ->when($disabled, 'pointer-events-none opacity-25');
@endphp

<{{ $tag }}
    class="{{ $classes }}"
    @if ($href)
        href="{{ $disabled ? '#' : $href }}"
        @if ($disabled)
            aria-disabled="true"
            tabindex="-1"
        @endif
    @else
        @if ($page !== null)
            x-on:click="$dispatch('page', {{ $page }})"
        @endif
        @if ($disabled)
            disabled
        @endif
    @endif
    data-pagination-item
>{{ $slot }}</{{ $tag }}>
