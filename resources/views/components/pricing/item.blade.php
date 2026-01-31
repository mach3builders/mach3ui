@props([
    'active' => false,
    'badge' => null,
    'description' => null,
    'features' => [],
    'period' => 'month',
    'price' => null,
    'title' => null,
])

@php
    $featuresSlot = $__laravel_slots['features'] ?? null;

    $classes = Ui::classes()
        ->add('flex flex-col rounded-xl p-1.5')
        ->add('bg-gray-30')
        ->add('dark:bg-gray-830')
        ->when($active, 'ring-2 ring-blue-600 dark:ring-blue-500');

    $innerClasses = Ui::classes()
        ->add('flex flex-1 flex-col rounded-lg border px-5 py-5 shadow-xs')
        ->add('border-gray-60 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-800');
@endphp

<div {{ $attributes->class($classes) }} data-pricing-item>
    <div class="{{ $innerClasses }}">
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
                <ui:badge>{{ $badge }}</ui:badge>
            @endif
        </div>

        <div class="mb-6">
            <span class="text-4xl font-bold text-gray-900 dark:text-white">{{ $price }}</span>

            <span class="text-gray-500 dark:text-gray-400">/ {{ $period }}</span>
        </div>

        @if ($featuresSlot)
            {{ $featuresSlot }}
        @elseif (count($features) > 0)
            <ul class="mb-6 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                @foreach ($features as $feature)
                    <li class="flex items-center gap-2">
                        <ui:icon name="check" class="size-4 shrink-0 text-green-600 dark:text-green-500" />

                        {{ $feature }}
                    </li>
                @endforeach
            </ul>
        @endif

        @if ($slot->isNotEmpty())
            <div class="mt-auto">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
