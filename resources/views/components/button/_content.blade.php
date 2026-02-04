@if ($icon)
    <span class="icon-start relative inline-flex">
        <ui:icon :name="$icon" :color="$iconColor" class="group-data-[loading]:opacity-0" />
        <ui:icon name="loader-circle"
            class="absolute inset-0 animate-spin [animation-duration:1.5s] opacity-0 group-data-[loading]:opacity-100" />
    </span>
@endif
@if ($hasText)
    @if ($textOnly)
        {{-- Text-only: spinner replaces text visually, text stays for width --}}
        <span class="relative inline-flex items-center justify-center">
            <span class="group-data-[loading]:opacity-0 inline-flex items-center justify-center">{{ $slot }}</span>
            <ui:icon name="loader-circle"
                class="absolute animate-spin [animation-duration:1.5s] opacity-0 group-data-[loading]:opacity-100" />
        </span>
    @else
        {{-- Has icon(s): text stays visible during loading --}}
        <span>{{ $slot }}</span>
    @endif
@endif
@if ($iconEnd)
    @if (!$icon && !$hasText)
        {{-- Icon-only with only trailing icon: show spinner --}}
        <span class="icon-end relative inline-flex ml-auto">
            <ui:icon :name="$iconEnd" :color="$iconEndColor" class="group-data-[loading]:opacity-0" />
            <ui:icon name="loader-circle"
                class="absolute inset-0 animate-spin [animation-duration:1.5s] opacity-0 group-data-[loading]:opacity-100" />
        </span>
    @else
        <ui:icon :name="$iconEnd" :color="$iconEndColor"
            class="icon-end ml-auto group-data-[loading]:opacity-0" />
    @endif
@endif
