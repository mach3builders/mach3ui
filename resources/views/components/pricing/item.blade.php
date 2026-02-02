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
    $hasFeatures = $featuresSlot || count($features) > 0;

    // Outer wrapper
    $classes = Ui::classes()
        ->add('flex flex-col rounded-xl p-1.5')
        ->add('bg-gray-30')
        ->add('dark:bg-gray-830')
        ->when($active, 'ring-2 ring-blue-600 dark:ring-blue-500')
        ->merge($attributes->only('class'));

    // Inner card
    $innerClasses = Ui::classes()
        ->add('flex flex-1 flex-col rounded-lg border px-5 py-5 shadow-xs')
        ->add('border-gray-60 bg-white')
        ->add('dark:border-gray-740 dark:bg-gray-800');

    // Header section
    $headerClasses = Ui::classes()->add('mb-4 flex items-start justify-between gap-2');

    $titleClasses = Ui::classes()->add('text-lg font-semibold')->add('text-gray-900')->add('dark:text-white');

    $descriptionClasses = Ui::classes()->add('mt-1 text-sm')->add('text-gray-500')->add('dark:text-gray-400');

    // Price section
    $priceSectionClasses = Ui::classes()->add('mb-6');

    $priceClasses = Ui::classes()->add('text-4xl font-bold')->add('text-gray-900')->add('dark:text-white');

    $periodClasses = Ui::classes()->add('text-gray-500')->add('dark:text-gray-400');

    // Features section
    $featureListClasses = Ui::classes()->add('mb-6 space-y-3 text-sm')->add('text-gray-700')->add('dark:text-gray-300');

    $featureItemClasses = Ui::classes()->add('flex items-center gap-2');

    $featureIconClasses = Ui::classes()->add('size-4 shrink-0')->add('text-green-600')->add('dark:text-green-500');

    // Action section
    $actionClasses = Ui::classes()->add('mt-auto');
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} data-pricing-item>
    <div class="{{ $innerClasses }}" data-pricing-item-inner>
        {{-- Header with title, description and badge --}}
        <div class="{{ $headerClasses }}" data-pricing-item-header>
            <div>
                @if ($title)
                    <h3 class="{{ $titleClasses }}" data-pricing-item-title>{{ $title }}</h3>
                @endif

                @if ($description)
                    <p class="{{ $descriptionClasses }}" data-pricing-item-description>{{ $description }}</p>
                @endif
            </div>

            @if ($badge)
                <ui:badge>{{ $badge }}</ui:badge>
            @endif
        </div>

        {{-- Price display --}}
        <div class="{{ $priceSectionClasses }}" data-pricing-item-price>
            <span class="{{ $priceClasses }}">{{ $price }}</span>
            <span class="{{ $periodClasses }}">/ {{ $period }}</span>
        </div>

        {{-- Features list --}}
        @if ($featuresSlot)
            {{ $featuresSlot }}
        @elseif (count($features) > 0)
            <ul class="{{ $featureListClasses }}" data-pricing-item-features>
                @foreach ($features as $feature)
                    <li class="{{ $featureItemClasses }}">
                        <ui:icon name="check" :class="$featureIconClasses" />
                        {{ $feature }}
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Action slot (buttons, links, etc.) --}}
        @if ($slot->isNotEmpty())
            <div class="{{ $actionClasses }}" data-pricing-item-action>
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
