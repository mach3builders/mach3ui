<div {{ $attributes->class(['flex items-center gap-4 mb-4']) }}>
    <div class="flex items-center gap-2">
        {{ $slot }}
    </div>

    @if (isset($search))
        <div class="ml-auto">
            {{ $search }}
        </div>
    @endif
</div>
