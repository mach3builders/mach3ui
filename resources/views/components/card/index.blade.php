@blaze

@props([
    'description' => null,
    'title' => null,
    'variant' => 'default',
])

@php
    $classes = Ui::classes()
        ->add('rounded-xl p-1.5')
        ->add($variant, [
            'default' => 'bg-gray-30 dark:bg-gray-830',
            'inverted' => 'bg-white dark:bg-gray-800',
            'simple' => 'bg-gray-30 dark:bg-gray-830',
        ])
        ->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" data-card data-variant="{{ $variant }}">
    @if ($title || $description)
        <ui:card.header>
            @if ($title)
                <ui:card.title>{{ $title }}</ui:card.title>
            @endif
            @if ($description)
                <ui:card.description>{{ $description }}</ui:card.description>
            @endif
        </ui:card.header>
    @endif

    @if ($slot->isNotEmpty())
        @if (str_contains($slot->toHtml(), 'data-card-body'))
            {{ $slot }}
        @else
            <ui:card.body>{{ $slot }}</ui:card.body>
        @endif
    @endif
</div>
