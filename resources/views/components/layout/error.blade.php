@blaze(fold: true)

@props([
    'code',
])

<div {{ $attributes->class('flex h-screen flex-col items-center justify-center text-center') }}>
    <div class="flex w-full max-w-lg flex-col items-center">
        <flux:heading level="1" class="text-[6rem] leading-none font-semibold tracking-tight">{{ __("errors.{$code}_title") }}</flux:heading>

        <flux:text variant="subtle" class="mt-1 max-w-sm">{{ __("errors.{$code}_body") }}</flux:text>

        <div class="mt-8">
            <flux:button href="/" icon="arrow-left">{{ __('common.go_back') }}</flux:button>
        </div>
    </div>
</div>
