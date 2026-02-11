@props([
    'description' => null,
    'header:cols' => null,
    'content:cols' => null,
    'title' => null,
    'variant' => 'responsive',
])

@php
    $headerCols = $__data['header:cols'] ?? null;
    $contentCols = $__data['content:cols'] ?? null;

    $headerSlot = $__laravel_slots['header'] ?? null;
    $hasHeader = $title || $description || $headerSlot;

    $classes = Ui::classes()
        ->add('@container grid grid-cols-12 gap-3')
        ->add('[[data-section]+&]:mt-8')
        ->add($variant, [
            'stacked' => '',
            'responsive' => '@xl:items-start @xl:gap-x-8',
            'form' => 'max-w-4xl',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-section data-variant="{{ $variant }}">
    @if ($hasHeader)
        <ui:section.header :variant="$variant" :cols="$headerCols">
            @if ($headerSlot)
                {{ $headerSlot }}
            @else
                @if ($title)
                    <ui:section.title>{{ $title }}</ui:section.title>
                @endif
                @if ($description)
                    <ui:section.description>{{ $description }}</ui:section.description>
                @endif
            @endif
        </ui:section.header>
    @endif

    <ui:section.content :variant="$variant" :cols="$contentCols">
        {{ $slot }}
    </ui:section.content>
</div>
