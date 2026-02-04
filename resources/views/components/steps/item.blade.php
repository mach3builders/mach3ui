@props([
    'href' => null,
    'status' => 'pending',
    'step' => null,
    'title' => null,
])

@php
    $isDone = $status === 'done';
    $isCurrent = $status === 'current';
    $isPending = $status === 'pending';
    $isClickable = $href && ($isDone || $isCurrent);
    $tag = $isClickable ? 'a' : 'div';

    $connectorClasses = Ui::classes()
        ->add('h-0.5 w-12 rounded-full first:hidden')
        ->when($isDone || $isCurrent, 'bg-gray-900 dark:bg-gray-100')
        ->when($isPending, 'bg-gray-200 dark:bg-gray-700');

    $itemClasses = Ui::classes()
        ->add('group flex items-center gap-3')
        ->when($isClickable, 'cursor-pointer');

    $indicatorClasses = Ui::classes()
        ->add('flex size-8 items-center justify-center rounded-full border-2 text-sm font-medium transition-colors')
        ->add($status, [
            'done' => 'border-gray-900 bg-gray-900 text-white dark:border-gray-100 dark:bg-gray-100 dark:text-gray-900',
            'current' => 'border-gray-900 bg-white text-gray-900 dark:border-gray-100 dark:bg-gray-900 dark:text-gray-100',
            'pending' => 'border-gray-200 bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400',
        ])
        ->when(
            $isDone && $isClickable,
            'group-hover:border-gray-700 group-hover:bg-gray-700 group-active:border-gray-600 group-active:bg-gray-600 dark:group-hover:border-gray-300 dark:group-hover:bg-gray-300 dark:group-active:border-gray-400 dark:group-active:bg-gray-400',
        )
        ->when(
            $isCurrent && $isClickable,
            'group-hover:border-gray-700 group-active:border-gray-600 dark:group-hover:border-gray-300 dark:group-active:border-gray-400',
        );

    $labelClasses = Ui::classes()
        ->add('hidden text-sm font-medium sm:block')
        ->add($isPending, [
            true => 'text-gray-500 dark:text-gray-400',
            false => 'text-gray-900 dark:text-gray-100',
        ])
        ->when(
            $isClickable,
            'group-hover:text-gray-700 group-active:text-gray-600 dark:group-hover:text-gray-300 dark:group-active:text-gray-400',
        );
@endphp

<div class="{{ $connectorClasses }}" data-steps-connector></div>

<{{ $tag }}
    {{ $attributes->except('class') }}
    class="{{ $itemClasses }}"
    @if ($isClickable) href="{{ $href }}" @endif
    @if ($isCurrent) aria-current="step" @endif
    data-steps-item
    data-status="{{ $status }}"
>
    <div class="{{ $indicatorClasses }}" data-steps-indicator>
        @if ($isDone)
            <ui:icon name="check" size="sm" />
        @else
            {{ $step }}
        @endif
    </div>

    @if ($title)
        <span class="{{ $labelClasses }}" data-steps-label>{{ $title }}</span>
    @endif
</{{ $tag }}>
