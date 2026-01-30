@props([
    'banner' => false,
])

@php
    $height_class = $banner ? 'h-[calc(100vh-2.5rem)]' : 'h-screen';

    $scrollbar_classes = [
        'overflow-y-auto',

        // Firefox
        '[scrollbar-width:thin]',
        '[scrollbar-color:transparent_transparent]',
        'hover:[scrollbar-color:theme(colors.gray.300)_transparent]',
        'dark:hover:[scrollbar-color:theme(colors.gray.600)_transparent]',

        // WebKit (Chrome, Safari, Edge)
        '[&::-webkit-scrollbar]:w-2',
        '[&::-webkit-scrollbar-track]:bg-transparent',
        '[&::-webkit-scrollbar-thumb]:rounded-full',
        '[&::-webkit-scrollbar-thumb]:bg-transparent',
        'hover:[&::-webkit-scrollbar-thumb]:bg-gray-300',
        'dark:hover:[&::-webkit-scrollbar-thumb]:bg-gray-600',
    ];
@endphp

<div {{ $attributes->class(array_merge(['relative z-10', $height_class], $scrollbar_classes)) }} x-data="{
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
    <div @class([
        'mx-auto flex flex-col max-w-10xl xl:flex-row',
        $banner ? 'min-h-[calc(100vh-2.5rem)]' : 'min-h-screen',
    ])>
        <ui:layout.backdrop />

        @persist('sidebar')
            <ui:layout.sidebar>
                <ui:layout.sidebar.header>
                    @if (isset($sidebarLogo))
                        <div class="flex items-center h-10">{{ $sidebarLogo }}</div>
                    @else
                        <ui:dropdown class="w-full" position="right-start">
                            <ui:dropdown.trigger variant="ghost" class="px-3!">
                                <ui:logo />
                            </ui:dropdown.trigger>

                            <ui:dropdown.menu>
                                <ui:dropdown.header title="Applications" />

                                @foreach (config('applications') as $name => $options)
                                    <ui:dropdown.item href="{{ $options['href'] }}" active="{{ $loop->first }}">
                                        <div class="flex items-center gap-3">
                                            <span
                                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg font-brand text-sm font-semibold bg-gray-80 dark:bg-gray-830">
                                                <span class="-skew-x-12 text-{{ $options['color'] }}-500">III</span>
                                            </span>

                                            <ui:text weight="semibold">Mach3{{ $name }}</ui:text>
                                            @if ($loop->first)
                                                <ui:icon name="check" size="sm" class="ml-auto text-blue-500" />
                                            @endif
                                        </div>
                                    </ui:dropdown.item>
                                @endforeach
                            </ui:dropdown.menu>
                        </ui:dropdown>
                    @endif

                    @if (isset($sidebarWorkspace))
                        {{ $sidebarWorkspace }}
                    @endif
                </ui:layout.sidebar.header>

                @if (isset($sidebarNav))
                    {{ $sidebarNav }}
                @else
                    <ui:layout.sidebar.nav>
                        <ui:nav>
                            <ui:nav.item icon="layout-dashboard" label="Dashboard" active />
                        </ui:nav>
                    </ui:layout.sidebar.nav>
                @endif

                @if (isset($sidebarFooter))
                    <ui:layout.sidebar.footer>
                        {{ $sidebarFooter }}
                    </ui:layout.sidebar.footer>
                @endif
            </ui:layout.sidebar>
        @endpersist

        <main class="flex-1" data-layout-main>
            <ui:layout.main.top-bar>
                <x-slot:breadcrumbs>
                    @stack('breadcrumbs')
                </x-slot:breadcrumbs>

                <x-slot:actions>
                    @if (isset($topbarActions))
                        {{ $topbarActions }}
                    @else
                        <ui:button size="sm" icon="package" variant="outline-danger">{{ __('common.free') }}</ui:button>
                    @endif
                </x-slot:actions>

                @if (isset($topbarUser))
                    {{ $topbarUser }}
                @else
                    <ui:dropdown position="bottom-end">
                        <ui:dropdown.trigger variant="ghost" class="px-2! py-1!">
                            <div class="flex items-center gap-2">
                                <ui:avatar name="{{ auth()->user()?->name ?? 'John Doe' }}" size="sm" />

                                <div class="hidden flex-col items-start sm:flex normal-case">
                                    <ui:text weight="medium">{{ auth()->user()?->name ?? 'John Doe' }}</ui:text>

                                    <ui:text size="xs" variant="muted">{{ auth()->user()?->account ?? 'Acme Inc' }}</ui:text>
                                </div>
                            </div>
                        </ui:dropdown.trigger>

                        <ui:dropdown.menu>
                            <ui:dropdown.header class="flex-col items-start gap-0!">
                                <ui:text weight="medium">{{ auth()->user()?->name ?? 'John Doe' }}</ui:text>

                                <ui:text size="xs" variant="muted">{{ auth()->user()?->email ?? 'john@example.com' }}</ui:text>
                            </ui:dropdown.header>

                            <ui:dropdown.item href="#" icon="user" label="Profile" />

                            <ui:dropdown.item href="#" icon="settings" label="Settings" />

                            <ui:dropdown.item href="#" icon="log-out" label="Logout" danger />

                            <ui:divider variant="subtle" />

                            <div class="flex items-center justify-between gap-1 pl-3">
                                <ui:text size="xs" variant="muted">Theme</ui:text>

                                <ui:theme-switcher />
                            </div>
                        </ui:dropdown.menu>
                    </ui:dropdown>
                @endif
            </ui:layout.main.top-bar>

            {{ $slot ?? '' }}
        </main>
    </div>
</div>
