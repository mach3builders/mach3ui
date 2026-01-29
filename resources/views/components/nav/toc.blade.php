@props([
    'icon' => 'table-of-contents',
    'offset' => 100,
    'title' => 'On this page',
])

<div
    x-data="{
        activeId: null,
        headings: [],
        offset: {{ $offset }},
        scrollHandler: null,
        livewireHandler: null,

        init() {
            this.collectHeadings();

            this.scrollHandler = () => this.onScroll();
            window.addEventListener('scroll', this.scrollHandler, { passive: true });

            this.livewireHandler = () => this.$nextTick(() => this.collectHeadings());
            document.addEventListener('livewire:navigated', this.livewireHandler);
        },

        destroy() {
            window.removeEventListener('scroll', this.scrollHandler);
            document.removeEventListener('livewire:navigated', this.livewireHandler);
        },

        collectHeadings() {
            this.headings = Array.from(document.querySelectorAll('[id]'))
                .filter(el => this.$el.querySelector(`a[href='#${el.id}']`));

            if (this.headings.length) {
                this.activeId = this.headings[0].id;
            }

            this.onScroll();
        },

        onScroll() {
            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            if (scrollY + windowHeight >= documentHeight - 50 && this.headings.length) {
                this.activeId = this.headings[this.headings.length - 1].id;
                return;
            }

            for (let i = this.headings.length - 1; i >= 0; i--) {
                if (this.headings[i].offsetTop - this.offset <= scrollY) {
                    this.activeId = this.headings[i].id;
                    return;
                }
            }

            if (this.headings.length) {
                this.activeId = this.headings[0].id;
            }
        },

        scrollTo(id, event) {
            event.preventDefault();
            const el = document.getElementById(id);
            if (el) {
                window.scrollTo({
                    top: el.offsetTop - this.offset + 20,
                    behavior: 'smooth'
                });
                this.activeId = id;
                history.pushState(null, null, `#${id}`);
            }
        },

        isActive(href) {
            return this.activeId === href.replace('#', '');
        }
    }"
    {{ $attributes->class(['hidden lg:block']) }}
    data-nav-toc
>
    @if ($title !== false)
        <ui:nav.title :icon="$icon !== false ? $icon : null" :title="$title" class="px-0!" />
    @endif

    <ui:nav variant="toc">
        {{ $slot }}
    </ui:nav>
</div>
