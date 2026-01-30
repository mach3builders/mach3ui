@props([
    'icon' => 'table-of-contents',
    'offset' => 100,
    'title' => 'On this page',
])

@once
    <script>
        window.tocNavInit = function(el, offset, setActive) {
            console.log('tocNavInit called');
            const links = el.querySelectorAll('[data-nav-item]');
            const ids = [...links].map(a => a.getAttribute('href')?.slice(1)).filter(Boolean);
            console.log('Found ids:', ids);

            if (!ids.length) return;

            setActive(ids[0]);
            console.log('Set initial active:', ids[0]);

            let lastActiveId = ids[0];

            window.addEventListener('scroll', () => {
                let newActiveId = ids[0];

                for (let i = ids.length - 1; i >= 0; i--) {
                    const section = document.getElementById(ids[i]);
                    if (section && section.getBoundingClientRect().top <= offset) {
                        newActiveId = ids[i];
                        break;
                    }
                }

                if (newActiveId !== lastActiveId) {
                    setActive(newActiveId);
                    console.log('Active changed to:', newActiveId);
                    const link = el.querySelector('[data-nav-item][href="#' + newActiveId + '"]');
                    if (link) link.scrollIntoView({
                        block: 'nearest',
                        behavior: 'smooth'
                    });
                    lastActiveId = newActiveId;
                }
            }, {
                passive: true
            });

            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const id = link.getAttribute('href')?.slice(1);
                    const target = document.getElementById(id);
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - offset + 20,
                            behavior: 'smooth'
                        });
                        history.pushState(null, null, '#' + id);
                    }
                });
            });
        };
    </script>
@endonce

{{-- blade-formatter-disable --}}
<div
    x-data="{ activeId: '' }"
    x-init="$nextTick(() => window.tocNavInit($el, {{ $offset }}, id => { activeId = id; console.log('activeId set to:', id); }))"
    {{ $attributes->class(['hidden lg:block max-h-[calc(100vh-8rem)] overflow-y-auto']) }}
    data-nav-toc
>
{{-- blade-formatter-enable --}}
@if ($title !== false)
    <ui:nav.title :icon="$icon !== false ? $icon : null" :title="$title" class="px-0!" />
@endif

<ui:nav variant="toc">
    {{ $slot }}
</ui:nav>
</div>
