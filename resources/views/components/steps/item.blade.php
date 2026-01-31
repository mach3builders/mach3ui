@props([
    'href' => null,
    'status' => 'pending',
    'step' => null,
    'title',
])

@php
    $isDone = $status === 'done';
    $isCurrent = $status === 'current';
    $isClickable = $href && ($isDone || $isCurrent);
    $tag = $isClickable ? 'a' : 'div';

    $classes = Ui::classes()->add('group flex items-center gap-3')->when($isClickable, 'cursor-pointer');

    $indicatorClasses = Ui::classes()
        ->add('flex h-8 w-8 items-center justify-center rounded-full border-2 text-sm font-medium')
        ->add(
            match (true) {
                $isDone
                    => 'border-gray-900 bg-gray-900 text-white dark:border-gray-100 dark:bg-gray-100 dark:text-gray-900',
                $isCurrent
                    => 'border-gray-900 bg-white text-gray-900 dark:border-gray-100 dark:bg-gray-900 dark:text-gray-100',
                default
                    => 'border-gray-200 bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400',
            },
        )
        ->when(
            $isDone && $isClickable,
            'group-hover:border-gray-700 group-hover:bg-gray-700 group-active:border-gray-600 group-active:bg-gray-600',
        )
        ->when(
            $isDone && $isClickable,
            'dark:group-hover:border-gray-300 dark:group-hover:bg-gray-300 dark:group-active:border-gray-400 dark:group-active:bg-gray-400',
        )
        ->when($isCurrent && $isClickable, 'group-hover:border-gray-700 group-active:border-gray-600')
        ->when($isCurrent && $isClickable, 'dark:group-hover:border-gray-300 dark:group-active:border-gray-400');

    $labelClasses = Ui::classes()
        ->add('hidden text-sm font-medium sm:block')
        ->add(
            match (true) {
                $isDone || $isCurrent => 'text-gray-900 dark:text-gray-100',
                default => 'text-gray-500 dark:text-gray-400',
            },
        )
        ->when($isClickable, 'group-hover:text-gray-700 group-active:text-gray-600')
        ->when($isClickable, 'dark:group-hover:text-gray-300 dark:group-active:text-gray-400');

    $connectorClasses = Ui::classes()
        ->add('first:hidden h-0.5 w-12 rounded-full')
        ->add(
            match (true) {
                $isDone || $isCurrent => 'bg-gray-900 dark:bg-gray-100',
                default => 'bg-gray-200 dark:bg-gray-700',
            },
        );
@endphp

<div class="{{ $connectorClasses }}"></div>

<{{ $tag }} {{ $attributes->class($classes) }}
    @if ($isClickable) href="{{ $href }}" @endif>
    <div class="{{ $indicatorClasses }}">
        @if ($isDone)
            <ui:icon name="check" class="size-4" />
        @else
            {{ $step }}
        @endif
    </div>

    <span class="{{ $labelClasses }}">{{ $title }}</span>
    </{{ $tag }}>
