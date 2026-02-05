@props([
    'addon' => null,
    'addonEnd' => null,
    'attributes' => null,
    'button' => null,
    'error' => null,
    'icon' => null,
    'iconEnd' => null,
    'iconWrapperClasses' => '',
    'id' => null,
    'inputClasses' => '',
    'isLive' => false,
    'name' => null,
    'type' => 'text',
    'wireTarget' => null,
    'wrapperClasses' => '',
])

@php
    $hasIcon = $icon !== null;
    $hasIconEnd = $iconEnd !== null;
    $hasAddon = $addon !== null;
    $hasAddonEnd = $addonEnd !== null;
    $hasButton = $button !== null;
@endphp

@if ($hasAddon || $hasAddonEnd)
    <ui:input.group>
        @if ($hasAddon)
            <ui:input.addon>{{ $addon }}</ui:input.addon>
        @endif

        @if ($hasIcon || $hasIconEnd || $hasButton)
            <div class="{{ $wrapperClasses }}" data-control>
                @if ($hasIcon)
                    <div class="{{ $iconWrapperClasses }} left-0 pl-3">
                        <ui:icon :name="$icon" class="size-4" />
                    </div>
                @endif

                <input type="{{ $type }}" @if ($id) id="{{ $id }}" @endif
                    @if ($name) name="{{ $name }}" @endif
                    @if ($error) aria-invalid="true" @endif
                    @if ($isLive) wire:loading.class="opacity-50" @endif
                    @if ($isLive && $wireTarget) wire:target="{{ $wireTarget }}" @endif
                    class="{{ $inputClasses }}" {{ $attributes->except(['class', 'name', 'id']) }} />

                @if ($hasIconEnd)
                    <div class="{{ $iconWrapperClasses }} right-0 pr-3">
                        <ui:icon :name="$iconEnd" class="size-4" />
                    </div>
                @endif

                @if ($hasButton)
                    <div class="absolute inset-y-0 right-0 flex items-center pr-1" data-input-button>
                        {{ $button }}
                    </div>
                @endif
            </div>
        @else
            <input type="{{ $type }}" @if ($id) id="{{ $id }}" @endif
                @if ($name) name="{{ $name }}" @endif
                @if ($error) aria-invalid="true" @endif
                @if ($isLive) wire:loading.class="opacity-50" @endif
                @if ($isLive && $wireTarget) wire:target="{{ $wireTarget }}" @endif
                class="{{ $inputClasses }}" {{ $attributes->except(['class', 'name', 'id']) }} data-control />
        @endif

        @if ($hasAddonEnd)
            <ui:input.addon>{{ $addonEnd }}</ui:input.addon>
        @endif
    </ui:input.group>
@elseif ($hasIcon || $hasIconEnd || $hasButton)
    <div class="{{ $wrapperClasses }}" data-control>
        @if ($hasIcon)
            <div class="{{ $iconWrapperClasses }} left-0 pl-3">
                <ui:icon :name="$icon" class="size-4" />
            </div>
        @endif

        <input type="{{ $type }}" @if ($id) id="{{ $id }}" @endif
            @if ($name) name="{{ $name }}" @endif
            @if ($error) aria-invalid="true" @endif
            @if ($isLive) wire:loading.class="opacity-50" @endif
            @if ($isLive && $wireTarget) wire:target="{{ $wireTarget }}" @endif class="{{ $inputClasses }}"
            {{ $attributes->except(['class', 'name', 'id']) }} />

        @if ($hasIconEnd)
            <div class="{{ $iconWrapperClasses }} right-0 pr-3">
                <ui:icon :name="$iconEnd" class="size-4" />
            </div>
        @endif

        @if ($hasButton)
            <div class="absolute inset-y-0 right-0 flex items-center pr-1" data-input-button>
                {{ $button }}
            </div>
        @endif
    </div>
@else
    <input type="{{ $type }}" @if ($id) id="{{ $id }}" @endif
        @if ($name) name="{{ $name }}" @endif
        @if ($error) aria-invalid="true" @endif
        @if ($isLive) wire:loading.class="opacity-50" @endif
        @if ($isLive && $wireTarget) wire:target="{{ $wireTarget }}" @endif class="{{ $inputClasses }}"
        {{ $attributes->except(['class', 'name', 'id']) }} data-control />
@endif
