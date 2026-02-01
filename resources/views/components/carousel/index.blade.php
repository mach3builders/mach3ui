@props([
    'autoplay' => null,
    'controls' => true,
    'indicators' => true,
    'perView' => 1,
])

@php
    $classes = Ui::classes()->add('relative w-full')->merge($attributes->only('class'));

    $controlClasses = Ui::classes()
        ->add(
            'pointer-events-auto inline-flex size-8 cursor-pointer items-center justify-center rounded-full border shadow-sm transition-colors',
        )
        ->add('border-gray-200 bg-white/80 text-gray-700 backdrop-blur-sm hover:bg-white hover:text-gray-900')
        ->add(
            'dark:border-gray-640 dark:bg-gray-800/80 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white',
        )
        ->add('focus:ring-1 focus:ring-offset-1 focus:outline-none focus:ring-gray-600')
        ->add('dark:focus:ring-offset-gray-800')
        ->add('disabled:cursor-not-allowed disabled:opacity-50');

    $prevClasses = Ui::classes($controlClasses)->add('-translate-x-1/2');
    $nextClasses = Ui::classes($controlClasses)->add('translate-x-1/2');

    $indicatorBaseClasses = Ui::classes()->add('size-2 rounded-full');
    $indicatorActiveClasses = Ui::classes($indicatorBaseClasses)->add('bg-gray-900')->add('dark:bg-gray-100');
    $indicatorInactiveClasses = Ui::classes($indicatorBaseClasses)
        ->add('bg-gray-200 hover:bg-gray-300')
        ->add('dark:bg-gray-700 dark:hover:bg-gray-600');
@endphp

<div x-data="{
    current: 0,
    total: 0,
    perView: {{ $perView }},
    autoplayInterval: {{ $autoplay ?? 0 }},
    timer: null,
    touchStartX: 0,
    init() {
        this.total = this.$refs.viewport.children.length;
        this.startAutoplay();
    },
    get maxIndex() {
        return this.perView > 1 ? this.total - this.perView : this.total - 1;
    },
    get translateX() {
        return this.perView > 1 ?
            this.current * (100 / this.perView) :
            this.current * 100;
    },
    prev() {
        if (this.current > 0) this.current--;
        this.resetAutoplay();
    },
    next() {
        if (this.current < this.maxIndex) {
            this.current++;
        } else if (this.autoplayInterval) {
            this.current = 0;
        }
        this.resetAutoplay();
    },
    goTo(index) {
        this.current = index;
        this.resetAutoplay();
    },
    startAutoplay() {
        if (this.autoplayInterval) {
            this.timer = setInterval(() => this.next(), this.autoplayInterval);
        }
    },
    resetAutoplay() {
        if (this.timer) {
            clearInterval(this.timer);
            this.startAutoplay();
        }
    },
    handleTouchStart(e) {
        this.touchStartX = e.changedTouches[0].screenX;
    },
    handleTouchEnd(e) {
        const diff = this.touchStartX - e.changedTouches[0].screenX;
        if (Math.abs(diff) > 50) {
            diff > 0 ? this.next() : this.prev();
        }
    },
}" x-on:touchstart.passive="handleTouchStart" x-on:touchend.passive="handleTouchEnd"
    class="{{ $classes }}" {{ $attributes->except('class') }} data-carousel>
    <div class="overflow-hidden" data-carousel-viewport>
        <div x-ref="viewport" class="flex transition-transform duration-300 ease-out"
            :style="`transform: translateX(-${translateX}%)`">
            {{ $slot }}
        </div>
    </div>

    @if ($controls)
        <div class="pointer-events-none absolute inset-y-0 right-0 left-0 flex items-center justify-between"
            data-carousel-controls>
            <button type="button" x-on:click="prev" :disabled="current === 0" class="{{ $prevClasses }}">
                <ui:icon name="chevron-left" class="size-4" />
            </button>

            <button type="button" x-on:click="next" :disabled="current >= maxIndex" class="{{ $nextClasses }}">
                <ui:icon name="chevron-right" class="size-4" />
            </button>
        </div>
    @endif

    @if ($indicators && $perView === 1)
        <div class="flex justify-center gap-1.5 pt-4" data-carousel-indicators>
            <template x-for="i in total" :key="i">
                <button type="button" x-on:click="goTo(i - 1)"
                    :class="current === i - 1 ? '{{ $indicatorActiveClasses }}' : '{{ $indicatorInactiveClasses }}'"></button>
            </template>
        </div>
    @endif
</div>
