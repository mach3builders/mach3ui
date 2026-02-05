@props([
    'label' => null,
    'max' => 100,
    'showValue' => false,
    'size' => 'md',
    'value' => 0,
    'variant' => 'primary',
])

@php
    $safeMax = max(1, $max);
    $percentage = min(100, max(0, round(($value / $safeMax) * 100)));

    $containerClasses = Ui::classes()->add('flex w-full flex-col gap-1.5')->merge($attributes);

    $labelClasses = Ui::classes()->add(
        'flex items-center justify-between text-sm font-medium text-gray-700 dark:text-gray-300',
    );

    $trackClasses = Ui::classes()
        ->add('w-full overflow-hidden rounded-full')
        ->add('bg-gray-100 dark:bg-gray-700')
        ->add($size, [
            'xs' => 'h-1',
            'sm' => 'h-1.5',
            'md' => 'h-2',
            'lg' => 'h-3',
            'xl' => 'h-4',
        ]);

    $barClasses = Ui::classes()
        ->add('h-full rounded-full transition-all duration-300 ease-out')
        ->add($variant, [
            'primary' => 'bg-blue-500 dark:bg-blue-600',
            'secondary' => 'bg-gray-700 dark:bg-gray-60',
            'success' => 'bg-green-600 dark:bg-green-500',
            'warning' => 'bg-amber-500 dark:bg-amber-400',
            'danger' => 'bg-red-600 dark:bg-red-500',
        ]);
@endphp

<div {{ $attributes->except('class') }} class="{{ $containerClasses }}" data-progress data-variant="{{ $variant }}">
    @if ($label || $showValue)
        <div class="{{ $labelClasses }}" data-progress-label>
            @if ($label)
                <span>{{ $label }}</span>
            @else
                <span></span>
            @endif

            @if ($showValue)
                <span data-progress-value>{{ $percentage }}%</span>
            @endif
        </div>
    @endif

    <div class="{{ $trackClasses }}" role="progressbar" aria-valuenow="{{ $value }}" aria-valuemin="0"
        aria-valuemax="{{ $max }}" data-progress-track>
        <div class="{{ $barClasses }}" style="width: {{ $percentage }}%" data-progress-bar></div>
    </div>
</div>
