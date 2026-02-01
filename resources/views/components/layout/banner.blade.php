@props([
    'name' => null,
    'switchUrl' => '#',
])

@php
    $classes = Ui::classes()
        ->add('sticky top-0 z-50 flex h-10 items-center justify-center gap-4 px-4')
        ->add('text-gray-20 bg-gray-800')
        ->add('dark:bg-white dark:text-gray-800')
        ->unless($name, 'hidden');
@endphp

<div {{ $attributes->class($classes) }} data-layout-banner>
    <div class="flex items-center gap-2">
        <div class="flex items-center gap-2 font-medium">
            <ui:icon name="glasses" class="size-4" />

            <span>{{ __('ui::ui.banner.logged_in_as') }} <strong>{{ $name }}</strong></span>
        </div>

        <ui:tooltip :text="__('ui::ui.banner.switch_account')" position="bottom">
            <ui:button variant="ghost" size="sm" icon="log-out" :href="$switchUrl"
                class="text-gray-100! dark:text-gray-980!" />
        </ui:tooltip>
    </div>
</div>
