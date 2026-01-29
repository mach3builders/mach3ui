<div
    {{ $attributes->class([
        'pointer-events-none fixed inset-0 z-40 bg-black/50 opacity-0 transition-opacity duration-300',
        'xl:hidden',
    ]) }}
    :class="{ 'pointer-events-auto! opacity-100!': sideBarOpen }"
    @click="sideBarOpen = false"
    data-layout-backdrop
></div>
