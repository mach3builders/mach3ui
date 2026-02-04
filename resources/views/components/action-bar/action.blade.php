@props([
    'icon' => null,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('inline-flex cursor-pointer items-center gap-1.5 rounded-md px-2.5 py-1.5 text-xs font-medium transition-colors')
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none')
        ->add('disabled:cursor-not-allowed disabled:opacity-50')
        ->add($variant, [
            'default' => 'text-gray-600 hover:bg-gray-60 hover:text-gray-900 focus:ring-gray-600 dark:text-gray-400 dark:hover:bg-gray-740 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800',
            'danger' => 'text-red-600 hover:bg-red-50 hover:text-red-700 focus:ring-red-600 dark:text-red-500 dark:hover:bg-red-950/50 dark:hover:text-red-400 dark:focus:ring-offset-gray-800',
            'success' => 'text-green-600 hover:bg-green-50 hover:text-green-700 focus:ring-green-600 dark:text-green-500 dark:hover:bg-green-950/50 dark:hover:text-green-400 dark:focus:ring-offset-gray-800',
        ])
        ->merge($attributes);
@endphp

<button {{ $attributes->except('class') }} type="button" class="{{ $classes }}" data-action-bar-action data-variant="{{ $variant }}">
    @if ($icon)
        <ui:icon :name="$icon" size="sm" />
    @endif

    @if ($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @endif
</button>
