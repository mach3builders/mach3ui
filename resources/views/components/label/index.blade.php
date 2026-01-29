@props([
    'badge' => null,
    'for' => null,
])

<label @if($for) for="{{ $for }}" @endif {{ $attributes->class([
    'inline-flex items-center gap-1.5 text-sm font-medium',
    'text-gray-800',
    'dark:text-gray-100',
]) }} data-label>
    {{ $slot }}

    @if ($badge)
        <ui:badge variant="secondary" class="font-normal ml-auto">{{ $badge }}</ui:badge>
    @endif
</label>
