@props([
    'data' => [],
    'height' => null,
    'labels' => [],
    'name' => null,
    'options' => [],
])

<ui:chart
    type="area"
    :data="$data"
    :labels="$labels"
    :height="$height"
    :name="$name"
    :options="$options"
    {{ $attributes }}
/>
