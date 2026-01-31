@props([])

@php
    $classes = Ui::classes()->add('flex items-center gap-4 mb-4');
@endphp

<div {{ $attributes->class($classes) }} data-table-action-bar>
    <div class="flex items-center gap-2">
        {{ $slot }}
    </div>

    @if (isset($search))
        <div class="ml-auto">
            {{ $search }}
        </div>
    @endif
</div>
