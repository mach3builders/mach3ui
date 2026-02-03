@props([
    'expanded' => false,
])

@php
    $expansionSlot = $__laravel_slots['expansion'] ?? null;
    $hasExpansion = $expansionSlot && $expansionSlot->isNotEmpty();

    $classes = Ui::classes()
        ->add('group')
        ->merge($attributes->only('class'));
@endphp

<tbody
    x-data="{ expanded: @js($expanded) }"
    x-bind:data-expanded="expanded ? 'true' : 'false'"
    x-bind:class="expanded && '[&_td]:bg-gray-20 dark:[&_td]:bg-gray-790'"
    data-tr-expandable
>
    <tr class="{{ $classes }}" {{ $attributes->except('class') }}>
        {{ $slot }}
    </tr>

    @if ($hasExpansion)
        {{ $expansionSlot }}
    @endif
</tbody>
