@props([
    'title' => null,
])

<ui:nav.title :title="$title" {{ $attributes }}>
    {{ $slot }}
</ui:nav.title>

<ui:divider variant="subtle" />
