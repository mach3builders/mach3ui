@props([
    'type' => 'default',
])

@php
    $type_classes = [
        'default' => 'bg-white dark:bg-gray-800',
        'message' => 'bg-white dark:bg-gray-800',
        'auth' => 'bg-gray-30 dark:bg-gray-830',
    ];
@endphp

<body
    {{ $attributes->class([
        'h-full min-h-screen font-sans text-sm antialiased text-gray-980 dark:text-gray-100',
        $type_classes[$type] ?? $type_classes['default'],
    ]) }}
    data-layout-body>
    @if ($type === 'auth')
        <main class="flex min-h-screen flex-col items-center justify-center py-20">
            @isset($topbar)
                <div class="fixed top-4 right-4 flex items-center gap-2">
                    {{ $topbar }}
                </div>
            @endisset

            <div class="flex w-full max-w-md flex-col items-center gap-6">
                @isset($logo)
                    {{ $logo }}
                @else
                    <ui:logo size="2xl" />
                @endisset

                {{ $slot }}
            </div>
        </main>
    @else
        {{ $slot }}
    @endif

    @stack('modals')
</body>
