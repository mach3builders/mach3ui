@props([
    'data' => [],
    'datasets' => null,
    'height' => null,
    'labels' => [],
    'name' => null,
    'options' => [],
    'type' => 'line',
])

@php
    // Support both 'data' and 'datasets' prop names
    $data = $datasets ?? $data;

    // Extract wire:model bindings safely
    $wireData = null;
    $wireLabels = null;

    foreach ($attributes->getAttributes() as $key => $value) {
        if (str_starts_with($key, 'wire:model') && is_string($value)) {
            $wireData = $value;
        }
        if (str_starts_with($key, 'wire:labels') && is_string($value)) {
            $wireLabels = $value;
        }
    }

    // Only keep string-valued attributes for rendering
    $safeAttributes = $attributes->filter(
        fn($value) => is_string($value) || is_bool($value) || is_numeric($value) || is_null($value),
    );

    $containerClasses = Ui::classes()->add('relative w-full')->merge($safeAttributes);

    // Merge default options with user options
    $chartOptions = array_replace_recursive(
        [
            'responsive' => true,
            'maintainAspectRatio' => $height === null,
            'plugins' => [
                'legend' => [
                    'display' => count($data) > 1,
                    'position' => 'bottom',
                    'labels' => [
                        'usePointStyle' => true,
                        'padding' => 16,
                    ],
                ],
            ],
        ],
        $options,
    );
@endphp

<div {{ $safeAttributes->except('class')->whereDoesntStartWith('wire:') }} class="{{ $containerClasses }}" data-chart
    data-chart-type="{{ $type }}" data-chart-labels="{{ json_encode($labels) }}"
    data-chart-data="{{ json_encode($data) }}" data-chart-options="{{ json_encode($chartOptions) }}"
    @if ($name) data-chart-name="{{ $name }}" @endif
    @if ($height) data-chart-height="{{ is_numeric($height) ? $height : true }}" @endif
    @if ($wireData || $wireLabels) x-data="{
            init() {
                @if ($wireData)
                    $wire.$watch('{{ $wireData }}', (value) => {
                        this.$el.updateChart?.(value);
                    }); @endif
    @if ($wireLabels) $wire.$watch('{{ $wireLabels }}', (value) => {
                        const data = JSON.parse(this.$el.dataset.chartData || '[]');
                        this.$el.updateChart?.(data, value);
                    }); @endif
    } }" @endif
    >
    <canvas
        @if ($height) style="height: {{ is_numeric($height) ? $height . 'px' : $height }}" @endif></canvas>
</div>
