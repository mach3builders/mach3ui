@props([
    'data' => [],
    'height' => null,
    'labels' => [],
    'name' => null,
    'options' => [],
])

@php
    $chartOptions = array_replace_recursive([
        'cutout' => '60%',
    ], $options);
@endphp

<ui:chart
    type="doughnut"
    :data="$data"
    :labels="$labels"
    :height="$height"
    :name="$name"
    :options="$chartOptions"
    {{ $attributes }}
/>
