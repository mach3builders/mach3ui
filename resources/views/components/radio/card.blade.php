@props([
    'checked' => false,
    'description' => null,
    'icon' => null,
    'reversed' => false,
    'title' => null,
])

@php
    $card_classes = [
        'group relative flex cursor-pointer items-start gap-3 rounded-lg border p-4 transition-colors',
        'border-gray-200 bg-white',
        'dark:border-gray-700 dark:bg-gray-800',
        'hover:border-gray-300 hover:bg-gray-50',
        'dark:hover:border-gray-600 dark:hover:bg-gray-750',
        'has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50',
        'dark:has-[:checked]:border-blue-500 dark:has-[:checked]:bg-blue-950/20',
        'has-[:focus]:ring-2 has-[:focus]:ring-blue-600/20',
        'dark:has-[:focus]:ring-blue-500/20',
        'has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50',
    ];

    $radio_classes = [
        'size-[18px] shrink-0 appearance-none rounded-full border cursor-pointer bg-center bg-no-repeat',
        'border-gray-300 bg-white',
        'dark:border-gray-600 dark:bg-gray-800',
        'checked:border-blue-600 checked:bg-blue-600',
        'dark:checked:border-blue-500 dark:checked:bg-blue-500',
        "checked:bg-[url('data:image/svg+xml,%3csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Ccircle%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%225%22%20fill%3D%22white%22%2F%3E%3C%2Fsvg%3E')]",
        'checked:bg-[length:14px]',
        'focus:outline-none',
        'disabled:cursor-not-allowed disabled:opacity-50',
    ];
@endphp

<label {{ $attributes->only('class')->class($card_classes) }}>
    @if ($reversed)
        <input
            type="radio"
            {{ $attributes->except('class')->class(array_merge($radio_classes, ['mt-px'])) }}
            @checked($checked)
        />
    @endif

    @if ($icon)
        <ui:icon :name="$icon" class="size-6 shrink-0 text-gray-500 dark:text-gray-400" />
    @endif

    <div class="flex-1">
        @if ($title)
            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $title }}</div>
        @endif

        @if ($description)
            <div class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">{{ $description }}</div>
        @endif

        @if ($slot->isNotEmpty())
            {{ $slot }}
        @endif
    </div>

    @if (!$reversed)
        <input
            type="radio"
            {{ $attributes->except('class')->class(array_merge($radio_classes, ['mt-px'])) }}
            @checked($checked)
        />
    @endif
</label>
