@props([
    'current' => 1,
    'percent' => true,
    'text' => true,
    'total' => 4,
])

@php
    $percentage = round(($current / $total) * 100);

    $classes = Ui::classes()->add('flex w-full flex-col gap-1')->merge($attributes->only('class'));

    $textClasses = Ui::classes()
        ->add('flex items-center justify-between text-xs font-bold')
        ->add('text-gray-400')
        ->add('dark:text-gray-340');

    $barClasses = Ui::classes()->add('flex items-center gap-4');

    $stepBaseClasses = Ui::classes()
        ->add('flex-1 py-2')
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none focus:ring-gray-600')
        ->add('dark:focus:ring-offset-gray-800');

    $indicatorClasses = Ui::classes()->add('block h-1.5 rounded-full')->add('bg-gray-100')->add('dark:bg-gray-700');

    $activeIndicatorClasses = Ui::classes()
        ->add('block h-1.5 rounded-full cursor-pointer')
        ->add('bg-gray-240 hover:bg-gray-300')
        ->add('dark:bg-gray-540 dark:hover:bg-gray-460');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-progress>
    @if ($text)
        <div class="{{ $textClasses }}">
            <div>{{ $current }} / {{ $total }}</div>

            @if ($percent)
                <div>{{ $percentage }}%</div>
            @endif
        </div>
    @endif

    <div class="{{ $barClasses }}">
        @for ($i = 1; $i <= $total; $i++)
            @php
                $isActive = $i <= $current;
            @endphp

            <button type="button" class="{{ $stepBaseClasses }}">
                <span class="{{ $isActive ? $activeIndicatorClasses : $indicatorClasses }}"></span>
            </button>
        @endfor
    </div>
</div>
