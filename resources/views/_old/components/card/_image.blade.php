@props([
    'image' => null,
    'imageSlot' => null,
    'isHorizontal' => false,
    'showOverlay' => false,
    'title' => null,
])

@php
    $wrapperClasses = Ui::classes()
        ->add('relative overflow-hidden rounded-lg')
        ->when($isHorizontal, 'w-1/3 shrink-0 *:h-full');
@endphp

@if ($imageSlot)
    <div {{ $imageSlot->attributes->class($wrapperClasses) }}>
        {{ $imageSlot }}
    </div>
@else
    <div class="{{ $wrapperClasses }}">
        <img src="{{ $image }}" alt="" class="w-full object-cover" />

        @if ($showOverlay)
            <div class="absolute inset-0 flex items-end bg-linear-to-t from-black/80 to-transparent p-4">
                <ui:card.title class="text-white">{{ $title }}</ui:card.title>
            </div>
        @endif
    </div>
@endif
