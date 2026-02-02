@props([
    'icon' => 'chevron-right',
    'open' => false,
    'title' => null,
])

@php
    $classes = Ui::classes()
        ->add('group/details rounded-lg border')
        ->add('border-gray-100 bg-gray-20')
        ->add('dark:border-gray-700 dark:bg-gray-820')
        ->merge($attributes->only('class'));
@endphp

<details {{ $attributes->except('class')->merge(['open' => $open]) }} class="{{ $classes }}" data-details>
    @if ($title)
        <ui:details.trigger :icon="$icon">{{ $title }}</ui:details.trigger>
        <ui:details.content>{{ $slot }}</ui:details.content>
    @else
        {{ $slot }}
    @endif
</details>
