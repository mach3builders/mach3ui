@props([
    'title' => null,
])

<ui:nav.title :title="$title" {{ $attributes }} data-dropdown-header>
    {{ $slot }}
</ui:nav.title>

<ui:divider variant="subtle" />
