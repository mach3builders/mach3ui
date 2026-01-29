@props([
    'copy' => null,
    'dismissible' => false,
    'href' => null,
    'icon' => null,
    'label' => null,
    'variant' => 'default',
])

@php
    $action = match (true) {
        $dismissible => 'dismiss',
        $copy !== null => 'copy',
        $href !== null => 'link',
        default => null,
    };

    $action_slot = $__laravel_slots['action'] ?? null;
    $has_action = $action || $action_slot;

    $variant_classes = [
        'default' => [
            'bg-gray-900 text-white',
            'dark:bg-gray-50 dark:text-gray-900',
        ],
        'secondary' => [
            'bg-gray-60 text-gray-900',
            'dark:bg-gray-720 dark:text-gray-50',
        ],
        'outline' => [
            'border-gray-120 bg-transparent text-gray-900',
            'dark:border-gray-640 dark:text-gray-50',
        ],
        'info' => [
            'bg-cyan-100 text-cyan-800',
            'dark:bg-cyan-900/30 dark:text-cyan-400',
        ],
        'success' => [
            'bg-green-100 text-green-800',
            'dark:bg-green-900/30 dark:text-green-400',
        ],
        'warning' => [
            'bg-amber-100 text-amber-800',
            'dark:bg-amber-900/30 dark:text-amber-400',
        ],
        'danger' => [
            'bg-red-100 text-red-800',
            'dark:bg-red-900/30 dark:text-red-400',
        ],
    ];

    $action_hover_classes = [
        'default' => 'hover:bg-gray-700 dark:hover:bg-gray-300',
        'secondary' => 'hover:bg-gray-140 dark:hover:bg-gray-600',
        'outline' => 'hover:bg-gray-100 dark:hover:bg-gray-700',
        'info' => 'hover:bg-cyan-200 dark:hover:bg-cyan-800/50',
        'success' => 'hover:bg-green-200 dark:hover:bg-green-800/50',
        'warning' => 'hover:bg-amber-200 dark:hover:bg-amber-800/50',
        'danger' => 'hover:bg-red-200 dark:hover:bg-red-800/50',
    ];
@endphp

<span
    @if ($action === 'dismiss')
        x-data="{ dismissed: false }"
        x-show="!dismissed"
        x-cloak
    @elseif ($action === 'copy')
        x-data="{ copied: false }"
    @endif
    {{ $attributes->class([
        'inline-flex cursor-default select-none items-center gap-1 rounded-full border px-2 py-px text-xs font-medium',
        'border-transparent' => $variant !== 'outline',
        'pl-1.5' => $icon,
        'pr-1' => $has_action,
        ...$variant_classes[$variant] ?? $variant_classes['default'],
    ]) }}
    data-badge
>
    @if ($icon)
        <ui:icon :name="$icon" class="size-3" />
    @endif

    {{ $label ?? $slot }}

    @if ($has_action)
        @if ($action_slot)
            {{ $action_slot }}
        @elseif ($action === 'link')
            <a
                href="{{ $href }}"
                target="_blank"
                rel="noopener noreferrer"
                @class([
                    '-mr-0.5 ml-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded-full',
                    $action_hover_classes[$variant] ?? $action_hover_classes['default'],
                ])
            >
                <ui:icon name="external-link" class="size-2.5" />
            </a>
        @else
            <button
                type="button"
                @if ($action === 'dismiss')
                    x-on:click="dismissed = true"
                @elseif ($action === 'copy')
                    x-on:click="navigator.clipboard.writeText('{{ $copy }}'); copied = true; setTimeout(() => copied = false, 2000)"
                @endif
                @class([
                    '-mr-0.5 ml-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded-full',
                    $action_hover_classes[$variant] ?? $action_hover_classes['default'],
                ])
            >
                @if ($action === 'copy')
                    <ui:icon name="copy" x-show="!copied" class="size-2.5" />

                    <ui:icon name="check" x-show="copied" x-cloak class="size-2.5" />
                @else
                    <ui:icon name="x" class="size-2.5" />
                @endif
            </button>
        @endif
    @endif
</span>
