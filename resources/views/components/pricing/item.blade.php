@props([
    'badge' => null,
    'badge:variant' => 'default',
    'description' => null,
    'features' => [],
    'featured' => false,
    'period' => null,
    'price' => null,
    'title' => null,
])

@php
    $badgeVariant = $__data['badge:variant'] ?? 'default';
    $featuresSlot = $__laravel_slots['features'] ?? null;
    $actionSlot = $__laravel_slots['action'] ?? null;
    $hasFeatures = $featuresSlot || count($features) > 0;

    $classes = Ui::classes()
        ->add('flex flex-col rounded-xl p-1.5')
        ->add('bg-gray-50 dark:bg-gray-850')
        ->when($featured, 'ring-2 ring-blue-500 dark:ring-blue-400')
        ->merge($attributes);

    $innerClasses = Ui::classes()
        ->add('flex flex-1 flex-col rounded-lg border px-5 py-5 shadow-xs')
        ->add('border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800');
@endphp

<div {{ $attributes->except('class') }} class="{{ $classes }}" @if ($featured) data-featured @endif data-pricing-item>
    <div class="{{ $innerClasses }}">
        {{-- Header --}}
        <div class="mb-4 flex items-start justify-between gap-2">
            <div>
                @if ($title)
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
                @endif
                @if ($description)
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $description }}</p>
                @endif
            </div>
            @if ($badge)
                <ui:badge :variant="$badgeVariant">{{ $badge }}</ui:badge>
            @endif
        </div>

        {{-- Price --}}
        @if ($price !== null)
            <div class="mb-6">
                <span class="text-4xl font-bold text-gray-900 dark:text-white">{{ $price }}</span>
                @if ($period)
                    <span class="text-gray-500 dark:text-gray-400">/ {{ $period }}</span>
                @endif
            </div>
        @endif

        {{-- Features --}}
        @if ($featuresSlot)
            {{ $featuresSlot }}
        @elseif (count($features) > 0)
            <ul class="mb-6 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                @foreach ($features as $feature)
                    <li class="flex items-center gap-2">
                        <ui:icon name="check" class="text-green-600 dark:text-green-500" />
                        {{ $feature }}
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Action --}}
        @if ($actionSlot)
            <div class="mt-auto">
                {{ $actionSlot }}
            </div>
        @elseif ($slot->isNotEmpty())
            <div class="mt-auto">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
