@props([
    'type' => 'default',
])

@php
    $logoSlot = $__laravel_slots['logo'] ?? null;
    $topbarSlot = $__laravel_slots['topbar'] ?? null;

    $classes = Ui::classes()
        ->add('h-screen min-h-screen font-sans text-sm antialiased')
        ->add('text-gray-980')
        ->add('dark:text-gray-100')
        ->add(
            match ($type) {
                'auth' => 'bg-gray-50 dark:bg-gray-830',
                default => 'bg-white dark:bg-gray-800',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<body class="{{ $classes }}" {{ $attributes->except('class') }} data-document-body>
    @if ($type === 'auth')
        <main class="flex min-h-screen flex-col items-center justify-center py-20">
            @if ($topbarSlot)
                <div class="fixed top-4 right-4 flex items-center gap-2">
                    {{ $topbarSlot }}
                </div>
            @endif

            <div class="flex w-full max-w-md flex-col items-center gap-6 [&>[data-card]]:w-full [&>[data-alert]]:w-full">
                @if ($logoSlot)
                    {{ $logoSlot }}
                @else
                    <ui:logo size="2xl" />
                @endif

                {{ $slot }}
            </div>
        </main>
    @else
        {{ $slot }}
    @endif

    @persist('notifications')
        <ui:toaster />
    @endpersist
</body>
