@props([
    'title',
    'description' => null,
    'price',
    'period' => 'month',
    'features' => [],
    'badge' => null,
    'active' => false,
])

<div {{ $attributes->class(['pricing-item']) }}>
    <ui:card :active="$active" class="flex flex-1 flex-col">
        <x-slot name="header">
            @if ($badge)
                <div class="flex items-center justify-between">
                    <h3 class="card-title">{{ $title }}</h3>

                    <span class="badge">{{ $badge }}</span>
                </div>
            @else
                <h3 class="card-title">{{ $title }}</h3>
            @endif

            @if ($description)
                <p class="card-description">{{ $description }}</p>
            @endif
        </x-slot>

        <div class="flex flex-1 flex-col gap-6">
            <div>
                <span class="pricing-price">{{ $price }}</span>

                @if ($period)
                    <span class="pricing-period">/{{ $period }}</span>
                @endif
            </div>

            @if (isset($featuresSlot))
                {{ $featuresSlot }}
            @elseif (count($features) > 0)
                <ul class="pricing-features">
                    @foreach ($features as $feature)
                        <li>
                            <x-lucide-check class="text-green-600 dark:text-green-500 h-4" />
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
    </ui:card>
</div>
