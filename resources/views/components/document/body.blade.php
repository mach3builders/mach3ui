@props([
    'type' => 'default',
])

@php
    $typeClasses = [
        'default' => 'bg-white dark:bg-gray-800',
        'message' => 'bg-white dark:bg-gray-800',
        'auth' => 'bg-gray-30 dark:bg-gray-830',
    ];

    $classes = Ui::classes()
        ->add('h-full min-h-screen font-sans text-sm antialiased')
        ->add('text-gray-980')
        ->add('dark:text-gray-100')
        ->add($typeClasses[$type] ?? $typeClasses['default'])
        ->merge($attributes->only('class'));
@endphp

<body class="{{ $classes }}" {{ $attributes->except('class') }} data-document-body>
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
