@props([
    'limit' => null,
    'size' => 'md',
])

@php
    $classes = Ui::classes()
        ->add('flex items-center')
        ->add('*:ring-2 *:ring-white dark:*:ring-gray-900')
        ->add(
            match ($size) {
                'xs' => '-space-x-2',
                'sm' => '-space-x-2.5',
                'lg' => '-space-x-4',
                'xl' => '-space-x-5',
                default => '-space-x-3',
            },
        );

    $limitClasses = Ui::classes()
        ->add('relative inline-flex shrink-0 items-center justify-center rounded-full font-medium')
        ->add('ring-2 ring-white bg-gray-100 text-gray-600')
        ->add('dark:bg-gray-700 dark:text-gray-300 dark:ring-gray-900')
        ->add(
            match ($size) {
                'xs' => 'size-6 text-[10px]',
                'sm' => 'size-8 text-xs',
                'lg' => 'size-12 text-base',
                'xl' => 'size-16 text-lg',
                default => 'size-10 text-sm',
            },
        );
@endphp

<div {{ $attributes->class($classes) }} data-avatar-group>
    {{ $slot }}

    @if ($limit)
        <span class="{{ $limitClasses }}">
            +{{ $limit }}
        </span>
    @endif
</div>
