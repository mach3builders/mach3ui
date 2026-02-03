@props([
    'href' => null,
    'label' => null,
])

@php
    $anchorId = $href && str_starts_with($href, '#') ? substr($href, 1) : null;

    $classes = Ui::classes()
        ->add('-ml-px border-l py-1 pl-4 text-[13px] leading-relaxed')
        ->merge($attributes->only('class'));
@endphp

<a class="{{ $classes }}" href="{{ $href }}"
    style="animation: toc-activate linear both; animation-timeline: --toc-{{ $anchorId }}; animation-range: cover 20% cover 100%;"
    {{ $attributes->except('class') }} data-nav-item>
    <span class="flex-1">{{ $label ?? $slot }}</span>
</a>

@once
    <style>
        :root {
            --toc-border: #ECEEF1;
            --toc-color: #6B7280;
            --toc-hover: #111827;
            --toc-active-border: #111827;
            --toc-active-color: #111827;
        }

        :root.dark {
            --toc-border: #374151;
            --toc-color: #9CA3AF;
            --toc-hover: #E5E7EB;
            --toc-active-border: #E5E7EB;
            --toc-active-color: #E5E7EB;
        }

        [data-nav-toc] [data-nav-item] {
            border-color: var(--toc-border);
            color: var(--toc-color);
        }

        [data-nav-toc] [data-nav-item]:hover {
            color: var(--toc-hover);
        }

        @keyframes toc-activate {

            0%,
            100% {
                border-color: var(--toc-border);
                color: var(--toc-color);
            }

            5%,
            95% {
                border-color: var(--toc-active-border);
                color: var(--toc-active-color);
            }
        }
    </style>
@endonce
