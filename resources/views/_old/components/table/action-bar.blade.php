@props([])

@php
    $searchSlot = $__laravel_slots['search'] ?? null;

    $classes = Ui::classes()->add('flex items-center gap-4 mb-4')->merge($attributes->only('class'));

    $actionsClasses = Ui::classes()->add('flex items-center gap-2');

    $searchClasses = Ui::classes()->add('ml-auto');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-table-action-bar>
    <div class="{{ $actionsClasses }}" data-table-action-bar-actions>
        {{ $slot }}
    </div>

    @if ($searchSlot)
        <div class="{{ $searchClasses }}" data-table-action-bar-search>
            {{ $searchSlot }}
        </div>
    @endif
</div>
