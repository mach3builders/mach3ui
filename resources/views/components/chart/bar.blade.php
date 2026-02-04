@props([
    'data' => [],
    'height' => null,
    'horizontal' => false,
    'labels' => [],
    'name' => null,
    'options' => [],
    'stacked' => false,
])

@php
    $chartOptions = array_replace_recursive([
        'indexAxis' => $horizontal ? 'y' : 'x',
        'scales' => [
            'x' => ['stacked' => $stacked],
            'y' => ['stacked' => $stacked],
        ],
    ], $options);
@endphp

<ui:chart
    type="bar"
    :data="$data"
    :labels="$labels"
    :height="$height"
    :name="$name"
    :options="$chartOptions"
    {{ $attributes }}
/>
