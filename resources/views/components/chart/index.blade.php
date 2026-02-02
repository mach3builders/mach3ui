@props([
    'datasets' => [],
    'labels' => [],
    'legend' => true,
    'options' => [],
    'size' => 'md',
    'type' => 'bar',
])

@php
    $isRadial = in_array($type, ['pie', 'doughnut']);

    $classes = Ui::classes()
        ->add('relative w-full')
        ->add(
            match ($size) {
                'sm' => 'h-48',
                'lg' => 'h-80',
                'square' => 'mx-auto aspect-square max-w-xs',
                default => 'h-64',
            },
        )
        ->merge($attributes->only('class'));
@endphp

<div class="{{ $classes }}" {{ $attributes->except('class') }} x-data="chart({
    type: @js($type),
    isRadial: @js($isRadial),
    showLegend: @js($legend),
    customOptions: @js($options),
    initialData: {
        labels: @js($labels),
        datasets: @js($datasets),
    },
})" x-modelable="chartData"
    data-chart>
    <canvas x-ref="canvas" data-chart-canvas></canvas>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('chart', (config) => ({
                    chart: null,
                    observer: null,
                    type: config.type,
                    isRadial: config.isRadial,
                    showLegend: config.showLegend,
                    customOptions: config.customOptions,
                    chartData: config.initialData,

                    async init() {
                        try {
                            await this.loadChartJs();
                            this.$nextTick(() => {
                                this.createChart();
                                this.observeTheme();
                            });
                        } catch (error) {
                            console.warn('Chart.js failed to load:', error);
                        }

                        this.$watch('chartData', () => this.updateChart(), {
                            deep: true
                        });
                    },

                    destroy() {
                        this.observer?.disconnect();
                        this.chart?.destroy();
                    },

                    loadChartJs() {
                        if (typeof Chart !== 'undefined') return Promise.resolve();

                        return new Promise((resolve, reject) => {
                            const script = document.createElement('script');
                            script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
                            script.onload = resolve;
                            script.onerror = () => reject(new Error('Failed to load Chart.js'));
                            document.head.appendChild(script);
                        });
                    },

                    getColors() {
                        const style = getComputedStyle(document.documentElement);
                        const colors = [];
                        const fills = [];

                        for (let i = 1; i <= 5; i++) {
                            colors.push(style.getPropertyValue(`--chart-${i}`).trim());
                            fills.push(style.getPropertyValue(`--chart-${i}-fill`).trim());
                        }

                        return {
                            colors,
                            fills,
                            axisLabel: style.getPropertyValue('--chart-axis-label-color').trim(),
                            gridLine: style.getPropertyValue('--chart-grid-line-color').trim(),
                        };
                    },

                    applyColors(datasets) {
                        const {
                            colors,
                            fills
                        } = this.getColors();

                        return datasets.map((dataset, index) => {
                            const i = index % colors.length;

                            const defaults =
                                this.type === 'bar' ? {
                                    backgroundColor: colors[i]
                                } :
                                this.type === 'line' ? {
                                    borderColor: colors[i],
                                    backgroundColor: dataset.fill ? fills[i] : 'transparent',
                                    tension: 0.4,
                                } :
                                this.isRadial ? {
                                    backgroundColor: colors
                                } : {};

                            return {
                                ...defaults,
                                ...dataset
                            };
                        });
                    },

                    getOptions() {
                        const {
                            axisLabel,
                            gridLine
                        } = this.getColors();

                        const base = {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: this.showLegend,
                                    position: this.isRadial ? 'bottom' : 'top',
                                    labels: {
                                        color: axisLabel
                                    },
                                },
                            },
                        };

                        if (!this.isRadial) {
                            base.scales = {
                                x: {
                                    ticks: {
                                        color: axisLabel
                                    },
                                    grid: {
                                        color: gridLine
                                    }
                                },
                                y: {
                                    ticks: {
                                        color: axisLabel
                                    },
                                    grid: {
                                        color: gridLine
                                    }
                                },
                            };
                        }

                        return this.deepMerge(base, this.customOptions || {});
                    },

                    deepMerge(target, source) {
                        const result = {
                            ...target
                        };

                        for (const key in source) {
                            const value = source[key];
                            result[key] =
                                value && typeof value === 'object' && !Array.isArray(value) ?
                                this.deepMerge(result[key] || {}, value) :
                                value;
                        }

                        return result;
                    },

                    createChart() {
                        this.chart?.destroy();
                        this.chart = new Chart(this.$refs.canvas, {
                            type: this.type,
                            data: {
                                labels: this.chartData.labels,
                                datasets: this.applyColors(this.chartData.datasets),
                            },
                            options: this.getOptions(),
                        });
                    },

                    updateChart() {
                        if (!this.chart) return;

                        this.chart.data.labels = this.chartData.labels || [];
                        this.chart.data.datasets = this.applyColors(this.chartData.datasets || []);
                        this.chart.update();
                    },

                    observeTheme() {
                        this.observer = new MutationObserver((mutations) => {
                            if (mutations.some((m) => m.attributeName === 'class')) {
                                this.createChart();
                            }
                        });

                        this.observer.observe(document.documentElement, {
                            attributes: true,
                            attributeFilter: ['class'],
                        });
                    },
                }));
            });
        </script>
    @endpush
@endonce
