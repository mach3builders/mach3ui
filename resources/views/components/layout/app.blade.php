@props([
    'banner' => false,
    'bannerName' => null,
    'bannerSwitchUrl' => '#',
])

@php
    $sidebarLogoSlot = $__laravel_slots['sidebarLogo'] ?? null;
    $sidebarWorkspaceSlot = $__laravel_slots['sidebarWorkspace'] ?? null;
    $sidebarNavSlot = $__laravel_slots['sidebarNav'] ?? null;
    $sidebarFooterSlot = $__laravel_slots['sidebarFooter'] ?? null;
    $topbarActionsSlot = $__laravel_slots['topbarActions'] ?? null;
    $topbarUserSlot = $__laravel_slots['topbarUser'] ?? null;

    $classes = Ui::classes()
        ->add('relative z-10')
        ->add($banner ? 'h-[calc(100vh-2.5rem)]' : 'h-screen')
        ->add('overflow-y-auto')
        // Firefox
        ->add('[scrollbar-width:thin]')
        ->add('[scrollbar-color:transparent_transparent]')
        ->add('hover:[scrollbar-color:theme(colors.gray.300)_transparent]')
        ->add('dark:hover:[scrollbar-color:theme(colors.gray.600)_transparent]')
        // WebKit (Chrome, Safari, Edge)
        ->add('[&::-webkit-scrollbar]:w-2')
        ->add('[&::-webkit-scrollbar-track]:bg-transparent')
        ->add('[&::-webkit-scrollbar-thumb]:rounded-full')
        ->add('[&::-webkit-scrollbar-thumb]:bg-transparent')
        ->add('hover:[&::-webkit-scrollbar-thumb]:bg-gray-300')
        ->add('dark:hover:[&::-webkit-scrollbar-thumb]:bg-gray-600');

    $innerClasses = Ui::classes()
        ->add('mx-auto flex flex-col max-w-10xl xl:flex-row')
        ->add($banner ? 'min-h-[calc(100vh-2.5rem)]' : 'min-h-screen');
@endphp

@if ($banner)
    <ui:layout.banner :name="$bannerName" :switch-url="$bannerSwitchUrl" />
@endif

<div class="{{ $classes }}" {{ $attributes->except('class') }} x-data="{
    sideBarOpen: false,
    init() {
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1280) this.sideBarOpen = false;
        });
        const topBar = this.$el.querySelector('[data-layout-main-top-bar]');
        if (topBar) {
            this.$el.addEventListener('scroll', () => topBar.classList.toggle('scrolled', this.$el.scrollTop > 0));
        }
        const sidebarHeader = this.$el.querySelector('[data-layout-sidebar-header]');
        const sidebarNav = this.$el.querySelector('[data-layout-sidebar-nav]');
        if (sidebarHeader && sidebarNav) {
            sidebarNav.addEventListener('scroll', () => sidebarHeader.classList.toggle('scrolled', sidebarNav.scrollTop > 0));
        }
    }
}"
    x-on:click="if ($event.target.closest('[data-layout-sidebar] .nav-item') && window.innerWidth < 1280) sideBarOpen = false"
    :class="{ 'overflow-hidden!': sideBarOpen }" data-layout-app>
    <div class="{{ $innerClasses }}">
        <ui:layout.backdrop />

        <ui:layout.sidebar :banner="$banner">
            <ui:layout.sidebar.header>
                @if ($sidebarLogoSlot)
                    <div class="flex items-center h-10">{{ $sidebarLogoSlot }}</div>
                @endif

                @if ($sidebarWorkspaceSlot)
                    {{ $sidebarWorkspaceSlot }}
                @endif
            </ui:layout.sidebar.header>

            @if ($sidebarNavSlot)
                {{ $sidebarNavSlot }}
            @else
                <ui:layout.sidebar.nav>
                    <ui:nav>
                        <ui:nav.item icon="layout-dashboard" :label="__('ui::ui.layout.dashboard')" active />
                    </ui:nav>
                </ui:layout.sidebar.nav>
            @endif

            @if ($sidebarFooterSlot)
                <ui:layout.sidebar.footer>
                    {{ $sidebarFooterSlot }}
                </ui:layout.sidebar.footer>
            @endif
        </ui:layout.sidebar>

        <main class="flex-1" data-layout-main>
            <ui:layout.main.top-bar>
                <x-slot:breadcrumbs>
                    @stack('breadcrumbs')
                </x-slot:breadcrumbs>

                <x-slot:actions>
                    @if ($topbarActionsSlot)
                        {{ $topbarActionsSlot }}
                    @endif
                </x-slot:actions>

                @if ($topbarUserSlot)
                    {{ $topbarUserSlot }}
                @endif
            </ui:layout.main.top-bar>

            {{ $slot ?? '' }}
        </main>
    </div>
</div>
