@props([
    'data' => [],
    'datasets' => null,
    'height' => null,
    'labels' => [],
    'name' => null,
    'options' => [],
])

@php
    $data = $datasets ?? $data;
    $chartOptions = array_replace_recursive(
        [
            'cutout' => '60%',
        ],
        $options,
    );
@endphp

<ui:chart type="doughnut" :data="$data" :labels="$labels" :height="$height" :name="$name"
    :options="$chartOptions" {{ $attributes }} />
