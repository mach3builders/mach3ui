@props([
    'description' => null,
    'icon' => 'search',
    'title' => null,
])

@php
    $classes = Ui::classes()->add('flex flex-col items-center justify-center py-16 text-center');

    $iconWrapperClasses = Ui::classes()
        ->add('mb-4 flex h-18 w-18 items-center justify-center rounded-full')
        ->add('bg-gray-60 text-gray-400')
        ->add('dark:bg-gray-750 dark:text-gray-500')
        ->add('[&>svg]:h-10 [&>svg]:w-10');

    $titleClasses = Ui::classes()->add('text-lg font-semibold')->add('text-gray-900')->add('dark:text-white');

    $descriptionClasses = Ui::classes()->add('mt-1 max-w-sm text-sm')->add('text-gray-500')->add('dark:text-gray-400');
@endphp

<div {{ $attributes->class($classes) }} data-layout-empty-state>
    <div class="{{ $iconWrapperClasses }}">
        <ui:icon :name="$icon" />
    </div>

    @if ($title)
        <h3 class="{{ $titleClasses }}">{{ $title }}</h3>
    @endif

    @if ($description)
        <p class="{{ $descriptionClasses }}">{{ $description }}</p>
    @endif

    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
