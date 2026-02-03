@props([
    'addon' => null,
    'addonEnd' => null,
    'attributes' => null,
    'error' => null,
    'icon' => null,
    'iconEnd' => null,
    'iconWrapperClasses' => '',
    'id' => null,
    'inputClasses' => '',
    'name' => null,
    'type' => 'text',
    'wrapperClasses' => '',
])

@php
    $hasIcon = $icon !== null;
    $hasIconEnd = $iconEnd !== null;
    $hasAddon = $addon !== null;
    $hasAddonEnd = $addonEnd !== null;
@endphp

@if ($hasAddon || $hasAddonEnd)
    <ui:input.group>
        @if ($hasAddon)
            <ui:input.addon>{{ $addon }}</ui:input.addon>
        @endif

        @if ($hasIcon || $hasIconEnd)
            <div class="{{ $wrapperClasses }}" data-control>
                @if ($hasIcon)
                    <div class="{{ $iconWrapperClasses }} left-0 pl-3">
                        <ui:icon :name="$icon" class="size-4" />
                    </div>
                @endif

                <input
                    type="{{ $type }}"
                    @if($id) id="{{ $id }}" @endif
                    @if($name) name="{{ $name }}" @endif
                    @if($error) aria-invalid="true" @endif
                    class="{{ $inputClasses }}"
                    {{ $attributes->except(['class', 'name', 'id']) }}
                />

                @if ($hasIconEnd)
                    <div class="{{ $iconWrapperClasses }} right-0 pr-3">
                        <ui:icon :name="$iconEnd" class="size-4" />
                    </div>
                @endif
            </div>
        @else
            <input
                type="{{ $type }}"
                @if($id) id="{{ $id }}" @endif
                @if($name) name="{{ $name }}" @endif
                @if($error) aria-invalid="true" @endif
                class="{{ $inputClasses }}"
                {{ $attributes->except(['class', 'name', 'id']) }}
                data-control
            />
        @endif

        @if ($hasAddonEnd)
            <ui:input.addon>{{ $addonEnd }}</ui:input.addon>
        @endif
    </ui:input.group>
@elseif ($hasIcon || $hasIconEnd)
    <div class="{{ $wrapperClasses }}" data-control>
        @if ($hasIcon)
            <div class="{{ $iconWrapperClasses }} left-0 pl-3">
                <ui:icon :name="$icon" class="size-4" />
            </div>
        @endif

        <input
            type="{{ $type }}"
            @if($id) id="{{ $id }}" @endif
            @if($name) name="{{ $name }}" @endif
            @if($error) aria-invalid="true" @endif
            class="{{ $inputClasses }}"
            {{ $attributes->except(['class', 'name', 'id']) }}
        />

        @if ($hasIconEnd)
            <div class="{{ $iconWrapperClasses }} right-0 pr-3">
                <ui:icon :name="$iconEnd" class="size-4" />
            </div>
        @endif
    </div>
@else
    <input
        type="{{ $type }}"
        @if($id) id="{{ $id }}" @endif
        @if($name) name="{{ $name }}" @endif
        @if($error) aria-invalid="true" @endif
        class="{{ $inputClasses }}"
        {{ $attributes->except(['class', 'name', 'id']) }}
        data-control
    />
@endif
