@props([
    'banner' => false,
    'toc' => null,
    'width' => 'full',
])

@php
    $paddingX = 'px-4 sm:px-8 lg:px-16 xl:px-20';

    $headerClasses = Ui::classes()
        ->add($paddingX)
        ->add('flex flex-col gap-4 py-6')
        ->add('[&:not(:has(+[data-layout-main-nav]))]:border-b')
        ->add('[&:not(:has(+[data-layout-main-nav]))]:border-gray-60')
        ->add('[&:not(:has(+[data-layout-main-nav]))]:dark:border-gray-740');

    $navClasses = Ui::classes()
        ->add($paddingX)
        ->add('sticky z-20')
        ->add($banner ? 'top-24' : 'top-14')
        ->add('bg-white')
        ->add('dark:bg-gray-800')
        ->add("before:absolute before:inset-x-0 before:bottom-0 before:-z-10 before:h-px before:content-['']")
        ->add('before:bg-gray-60')
        ->add('dark:before:bg-gray-740');

    $sectionClasses = Ui::classes()
        ->add($paddingX)
        ->add('relative z-10 pb-20')
        ->add('has-[[data-layout-main-toc]]:flex has-[[data-layout-main-toc]]:gap-8');

    $tocClasses = Ui::classes()
        ->add('sticky mt-10 hidden h-fit w-56 shrink-0 lg:flex lg:flex-col lg:items-end')
        ->add($banner ? 'top-34' : 'top-24');
@endphp

<div {{ $attributes }} data-layout-main-content>
    <header class="{{ $headerClasses }}" data-layout-main-header>
        @if (isset($progress))
            <div class="w-full">
                {{ $progress }}
            </div>
        @endif

        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between lg:gap-6">
            <div class="flex grow flex-col items-start gap-1">
                @if (isset($header))
                    {{ $header }}
                @else
                    <ui:heading level="1" size="xl">{{ $title ?? __('ui::ui.layout.page_title') }}</ui:heading>

                    @if (isset($description))
                        <ui:text variant="muted">{{ $description }}</ui:text>
                    @endif
                @endif

                @if (isset($badges))
                    <div class="flex items-center gap-1 mt-1">
                        {{ $badges }}
                    </div>
                @endif
            </div>

            @if (isset($actions))
                <div class="flex items-center gap-4">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </header>

    @if (isset($nav))
        <nav class="{{ $navClasses }}" data-layout-main-nav>
            <div class="w-full">
                {{ $nav }}
            </div>
        </nav>
    @endif

    <section class="{{ $sectionClasses }}" data-layout-main-body>
        <div class="space-y-12 pt-10 pb-20 max-w-{{ $width }}">
            {{ $slot }}
        </div>

        @if ($toc)
            <aside class="{{ $tocClasses }}" data-layout-main-toc>
                {{ $toc }}
            </aside>
        @endif
    </section>
</div>
