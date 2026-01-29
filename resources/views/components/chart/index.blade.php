@props([
    'datasets' => [],
    'labels' => [],
    'legend' => true,
    'options' => [],
    'size' => 'md',
    'type' => 'bar',
])

@php
    $size_classes = [
        'sm' => 'h-48',
        'md' => 'h-64',
        'lg' => 'h-80',
        'square' => 'aspect-square max-w-xs mx-auto',
    ];

    $size_class = $size_classes[$size] ?? $size_classes['md'];
    $is_radial = in_array($type, ['pie', 'doughnut']);
@endphp

<div
    {{ $attributes->class(['relative w-full', $size_class]) }}
    x-data="{
        chart: null,
        type: @js($type),
        isRadial: @js($is_radial),
        showLegend: @js($legend),
        customOptions: @js($options),
        chartData: {
            labels: @js($labels),
            datasets: @js($datasets),
        },

        async init() {
            await this.loadChartJs();
            this.$nextTick(() => {
                this.createChart();
                this.observeTheme();
            });

            this.$watch('chartData', () => {
                if (this.chart) {
                    this.chart.data.labels = this.chartData.labels || [];
                    this.chart.data.datasets = this.applyColors(this.chartData.datasets || []);
                    this.chart.update();
                }
            }, { deep: true });
        },

        loadChartJs() {
            return new Promise((resolve) => {
                if (typeof Chart !== 'undefined') {
                    resolve();
                    return;
                }
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
                script.onload = resolve;
                document.head.appendChild(script);
            });
        },

        getColors() {
            const style = getComputedStyle(document.documentElement);
            return {
                colors: [
                    style.getPropertyValue('--chart-1').trim(),
                    style.getPropertyValue('--chart-2').trim(),
                    style.getPropertyValue('--chart-3').trim(),
                    style.getPropertyValue('--chart-4').trim(),
                    style.getPropertyValue('--chart-5').trim(),
                ],
                fills: [
                    style.getPropertyValue('--chart-1-fill').trim(),
                    style.getPropertyValue('--chart-2-fill').trim(),
                    style.getPropertyValue('--chart-3-fill').trim(),
                    style.getPropertyValue('--chart-4-fill').trim(),
                    style.getPropertyValue('--chart-5-fill').trim(),
                ],
                axisLabel: style.getPropertyValue('--chart-axis-label-color').trim(),
                gridLine: style.getPropertyValue('--chart-grid-line-color').trim(),
            };
        },

        applyColors(datasets) {
            const colors = this.getColors();
            return datasets.map((dataset, index) => {
                const colorIndex = index % colors.colors.length;
                const defaults = {};
                if (this.type === 'bar') {
                    defaults.backgroundColor = dataset.backgroundColor || colors.colors[colorIndex];
                } else if (this.type === 'line') {
                    defaults.borderColor = dataset.borderColor || colors.colors[colorIndex];
                    defaults.backgroundColor = dataset.fill ? (dataset.backgroundColor || colors.fills[colorIndex]) : 'transparent';
                    defaults.tension = dataset.tension ?? 0.4;
                } else if (this.isRadial) {
                    defaults.backgroundColor = dataset.backgroundColor || colors.colors;
                }
                return { ...defaults, ...dataset };
            });
        },

        getOptions() {
            const colors = this.getColors();
            const baseOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: this.showLegend,
                        position: this.isRadial ? 'bottom' : 'top',
                        labels: { color: colors.axisLabel },
                    },
                },
            };
            if (!this.isRadial) {
                baseOptions.scales = {
                    x: { ticks: { color: colors.axisLabel }, grid: { color: colors.gridLine } },
                    y: { ticks: { color: colors.axisLabel }, grid: { color: colors.gridLine } },
                };
            }
            return this.deepMerge(baseOptions, this.customOptions || {});
        },

        deepMerge(target, source) {
            const result = { ...target };
            for (const key in source) {
                if (source[key] && typeof source[key] === 'object' && !Array.isArray(source[key])) {
                    result[key] = this.deepMerge(result[key] || {}, source[key]);
                } else {
                    result[key] = source[key];
                }
            }
            return result;
        },

        createChart() {
            if (this.chart) this.chart.destroy();
            this.chart = new Chart(this.$refs.canvas, {
                type: this.type,
                data: {
                    labels: this.chartData.labels,
                    datasets: this.applyColors(this.chartData.datasets),
                },
                options: this.getOptions(),
            });
        },

        observeTheme() {
            new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.attributeName === 'class') this.createChart();
                });
            }).observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        },
    }"
    x-modelable="chartData"
    {{ $attributes->whereStartsWith('wire:') }}
    data-chart
>
    <canvas x-ref="canvas"></canvas>
</div>
