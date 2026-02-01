@props([
    'active' => false,
    'badge' => null,
    'description' => null,
    'features' => [],
    'period' => 'month',
    'price',
    'title',
])

@php
    $featuresSlot = $__laravel_slots['featuresSlot'] ?? null;

    $classes = Ui::classes()->add('pricing-item')->merge($attributes->only('class'));
    $titleClasses = Ui::classes()->add('card-title');
    $badgeClasses = Ui::classes()->add('badge');
    $descriptionClasses = Ui::classes()->add('card-description');
    $priceClasses = Ui::classes()->add('pricing-price');
    $periodClasses = Ui::classes()->add('pricing-period');
    $featuresClasses = Ui::classes()->add('pricing-features');
    $iconClasses = Ui::classes()->add('h-4 text-green-600')->add('dark:text-green-500');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-pricing-item>
    <ui:card :active="$active" class="flex flex-1 flex-col">
        <x-slot name="header">
            @if ($badge)
                <div class="flex items-center justify-between">
                    <h3 class="{{ $titleClasses }}">{{ $title }}</h3>

                    <span class="{{ $badgeClasses }}">{{ $badge }}</span>
                </div>
            @else
                <h3 class="{{ $titleClasses }}">{{ $title }}</h3>
            @endif

            @if ($description)
                <p class="{{ $descriptionClasses }}">{{ $description }}</p>
            @endif
        </x-slot>

        <div class="flex flex-1 flex-col gap-6">
            <div>
                <span class="{{ $priceClasses }}">{{ $price }}</span>

                @if ($period)
                    <span class="{{ $periodClasses }}">/{{ $period }}</span>
                @endif
            </div>

            @if ($featuresSlot)
                {{ $featuresSlot }}
            @elseif (count($features) > 0)
                <ul class="{{ $featuresClasses }}">
                    @foreach ($features as $feature)
                        <li>
                            <ui:icon name="check" :class="$iconClasses" />
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
