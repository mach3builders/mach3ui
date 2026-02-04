@props([
    'data' => [],
    'datasets' => null,
    'height' => null,
    'labels' => [],
    'name' => null,
    'options' => [],
])

@php($data = $datasets ?? $data)

<ui:chart type="area" :data="$data" :labels="$labels" :height="$height" :name="$name"
    :options="$options" {{ $attributes }} />
