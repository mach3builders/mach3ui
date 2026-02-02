@props([
    'icon' => 'table-of-contents',
    'offset' => 100,
    'title' => 'On this page',
])

@php
    $classes = Ui::classes()
        ->add('hidden max-h-[calc(100vh-8rem)] overflow-y-auto lg:block')
        ->merge($attributes->only('class'));
@endphp

<div x-data="{
    init() {
        const links = this.$el.querySelectorAll('[data-nav-item]')
        const ids = [...links].map(a => a.getAttribute('href')?.slice(1)).filter(Boolean)

        document.body.style.timelineScope = ids.map(id => `--toc-${id}`).join(', ')

        ids.forEach(id => {
            const section = document.getElementById(id)
            if (section) {
                section.style.viewTimelineName = `--toc-${id}`
                section.style.scrollMarginTop = '{{ $offset }}px'
            }
        })
    },
}" class="{{ $classes }}" {{ $attributes->except('class') }} data-nav-toc>
    @if ($title !== false)
        <ui:nav.title :icon="$icon !== false ? $icon : null" :title="$title" class="px-0" />
    @endif

    <ui:nav variant="toc">
        {{ $slot }}
    </ui:nav>
</div>
