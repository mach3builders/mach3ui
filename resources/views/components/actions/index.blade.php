@props([
    'grouped' => false,
    'position' => 'bottom-end',
])

@php
    $classes = Ui::classes()->add('inline-flex items-center gap-1')->merge($attributes->only('class'));
@endphp

@if ($grouped)
    <ui:dropdown :position="$position">
        <ui:button variant="ghost" size="sm" icon="ellipsis-vertical" x-bind:popovertarget="id"
            style="anchor-name: --dropdown-trigger;" />

        <ui:dropdown.menu>
            {{ $slot }}
        </ui:dropdown.menu>
    </ui:dropdown>
@else
    <div class="{{ $classes }}" {{ $attributes->except('class') }} data-actions>
        {{ $slot }}
    </div>
@endif
