@props([
    'expanded' => false,
])

@php
    $expansionSlot = $__laravel_slots['expansion'] ?? null;
    $hasExpansion = $expansionSlot && $expansionSlot->isNotEmpty();

    $classes = Ui::classes()->add('group/row')->merge($attributes->only('class'));
@endphp

<tbody class="{{ $classes }}" {{ $attributes->except('class') }} data-table-row
    @if ($hasExpansion) x-data="{ expanded: @js($expanded) }"
        x-bind:data-expanded="expanded ? 'true' : 'false'" @endif>
    <tr @if ($hasExpansion) :class="expanded && '*:bg-gray-20 dark:*:bg-gray-780'" @endif>
        {{ $slot }}
    </tr>

    @if ($hasExpansion)
        <tr x-show="expanded" x-cloak data-table-row-expansion>
            {{ $expansionSlot }}
        </tr>
    @endif
</tbody>
