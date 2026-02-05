@props([
    'data' => [],
    'datasets' => null,
    'height' => 200,
    'labels' => [],
    'name' => null,
    'type' => 'bar',
    'showGrid' => true,
    'showLabels' => true,
    'showLegend' => null,
    'showValues' => false,
])

@php
    $data = $datasets ?? $data;
    $showLegend = $showLegend ?? count($data) > 1;

    $containerClasses = UI::classes()->add('ui-chart')->merge($attributes);
@endphp

<div {{ $attributes->except('class') }} class="{{ $containerClasses }}"
    @if ($name) data-chart-name="{{ $name }}" @endif x-data="uiChart({
        type: @js($type),
        data: @js($data),
        labels: @js($labels),
        height: @js($height),
        showGrid: @js($showGrid),
        showLabels: @js($showLabels),
        showLegend: @js($showLegend),
        showValues: @js($showValues),
    })">
    {{-- Inline styles for scoped CSS --}}
    <style>
        .ui-chart {
            --chart-color-1: var(--color-blue-500, #3b82f6);
            --chart-color-2: var(--color-emerald-500, #10b981);
            --chart-color-3: var(--color-amber-500, #f59e0b);
            --chart-color-4: var(--color-rose-500, #f43f5e);
            --chart-color-5: var(--color-violet-500, #8b5cf6);
            --chart-color-6: var(--color-cyan-500, #06b6d4);
            --chart-grid: var(--color-gray-200, #e5e7eb);
            --chart-label: var(--color-gray-500, #6b7280);
        }

        .dark .ui-chart,
        .ui-chart.dark {
            --chart-grid: var(--color-gray-700, #374151);
            --chart-label: var(--color-gray-400, #9ca3af);
        }

        .ui-chart {
            position: relative;
        }

        .ui-chart svg {
            width: 100%;
            display: block;
        }

        .ui-chart .chart-grid-line {
            stroke: var(--chart-grid);
            stroke-width: 1;
        }

        .ui-chart .chart-axis-label {
            fill: var(--chart-label);
            font-size: 11px;
            font-family: inherit;
        }

        .ui-chart .chart-value-label {
            fill: var(--chart-label);
            font-size: 10px;
            font-family: inherit;
        }

        .ui-chart .chart-bar {
            transition: opacity 0.15s ease;
        }

        .ui-chart .chart-bar:hover {
            opacity: 0.8;
        }

        .ui-chart .chart-line {
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .ui-chart .chart-area {
            opacity: 0.15;
        }

        .ui-chart .chart-point {
            transition: r 0.15s ease;
        }

        .ui-chart .chart-point:hover {
            r: 5;
        }

        .ui-chart .chart-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            padding-top: 0.75rem;
            font-size: 0.75rem;
            color: var(--chart-label);
        }

        .ui-chart .chart-legend-item {
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .ui-chart .chart-legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .ui-chart .chart-slice {
            transition: opacity 0.15s ease;
        }

        .ui-chart .chart-slice:hover {
            opacity: 0.85;
        }

        .ui-chart .chart-tooltip {
            position: absolute;
            pointer-events: none;
            background: var(--color-gray-900, #111827);
            color: var(--color-white, #fff);
            padding: 0.375rem 0.625rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            line-height: 1.2;
            white-space: nowrap;
            z-index: 50;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            transform: translate(-50%, -100%);
            margin-top: -8px;
        }

        .dark .ui-chart .chart-tooltip {
            background: var(--color-gray-100, #f3f4f6);
            color: var(--color-gray-900, #111827);
        }

        .ui-chart .chart-tooltip-label {
            color: var(--color-gray-400, #9ca3af);
            font-size: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .dark .ui-chart .chart-tooltip-label {
            color: var(--color-gray-500, #6b7280);
        }

        .ui-chart .chart-tooltip-value {
            font-weight: 600;
        }

        .ui-chart .chart-tooltip-color {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
        }
    </style>

    {{-- SVG Chart rendered via JS --}}
    <div x-html="renderChart()" @mouseleave="hideTooltip()"></div>

    {{-- Tooltip --}}
    <div x-show="tooltip.show" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="chart-tooltip"
        :style="`left: ${tooltip.x}px; top: ${tooltip.y}px`" x-html="tooltip.content"></div>

    {{-- Legend --}}
    <div x-show="showLegend && legendItems.length > 0" class="chart-legend">
        <template x-for="(item, i) in legendItems" :key="i">
            <div class="chart-legend-item">
                <span class="chart-legend-dot" :style="`background: ${item.color}`"></span>
                <span x-text="item.label"></span>
            </div>
        </template>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        if (Alpine.data.uiChart) return;

        Alpine.data('uiChart', (config) => ({
            type: config.type,
            data: config.data,
            labels: config.labels,
            height: config.height,
            showGrid: config.showGrid,
            showLabels: config.showLabels,
            showLegend: config.showLegend,
            showValues: config.showValues,

            // Dimensions
            width: 400,
            ready: false,
            padding: {
                top: 20,
                right: 20,
                bottom: 30,
                left: 50
            },

            // Resolved colors (computed from CSS vars)
            resolvedColors: [],

            // Tooltip state
            tooltip: {
                show: false,
                x: 0,
                y: 0,
                content: '',
            },

            init() {
                this.resolveColors();
                this.$nextTick(() => {
                    this.updateDimensions();
                    this.ready = true;
                });

                const resizeObserver = new ResizeObserver(() => {
                    this.updateDimensions();
                });
                resizeObserver.observe(this.$el);

                // Watch for dark mode changes
                const darkModeObserver = new MutationObserver(() => {
                    this.resolveColors();
                });
                darkModeObserver.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });

                this.$cleanup = () => {
                    resizeObserver.disconnect();
                    darkModeObserver.disconnect();
                };
            },

            resolveColors() {
                const style = getComputedStyle(this.$el);
                this.resolvedColors = [
                    style.getPropertyValue('--chart-color-1').trim() || '#3b82f6',
                    style.getPropertyValue('--chart-color-2').trim() || '#10b981',
                    style.getPropertyValue('--chart-color-3').trim() || '#f59e0b',
                    style.getPropertyValue('--chart-color-4').trim() || '#f43f5e',
                    style.getPropertyValue('--chart-color-5').trim() || '#8b5cf6',
                    style.getPropertyValue('--chart-color-6').trim() || '#06b6d4',
                ];
            },

            getColor(index) {
                return this.resolvedColors[index % this.resolvedColors.length] || this
                    .resolvedColors[0];
            },

            updateDimensions() {
                const rect = this.$el.getBoundingClientRect();
                if (rect.width > 0) {
                    this.width = rect.width;
                }
            },

            get chartHeight() {
                return this.height - this.padding.top - this.padding.bottom;
            },

            get chartWidth() {
                return this.width - this.padding.left - this.padding.right;
            },

            get maxValue() {
                let max = 0;
                this.data.forEach(dataset => {
                    (dataset.data || []).forEach(v => {
                        if (v > max) max = v;
                    });
                });
                return max || 1;
            },

            get niceMax() {
                const max = this.maxValue;
                if (max === 0) return 1;
                const magnitude = Math.pow(10, Math.floor(Math.log10(max)));
                const normalized = max / magnitude;
                let nice = normalized <= 1 ? 1 : normalized <= 2 ? 2 : normalized <= 5 ? 5 : 10;
                return nice * magnitude;
            },

            get legendItems() {
                if (this.type === 'pie' || this.type === 'doughnut') {
                    return this.labels.map((label, i) => ({
                        label,
                        color: this.getColor(i),
                    }));
                }
                return this.data.map((dataset, i) => ({
                    label: dataset.label || `Dataset ${i + 1}`,
                    color: this.getColor(i),
                }));
            },

            formatValue(value) {
                if (value >= 1000000) return (value / 1000000).toFixed(1) + 'M';
                if (value >= 1000) return (value / 1000).toFixed(1) + 'K';
                return Math.round(value * 10) / 10;
            },

            renderChart() {
                if (!this.ready) return '';

                const svg = [];
                svg.push(
                    `<svg viewBox="0 0 ${this.width} ${this.height}" style="height: ${this.height}px" preserveAspectRatio="xMidYMid meet">`
                );

                if (this.type === 'bar') {
                    svg.push(this.renderBarChart());
                } else if (this.type === 'line' || this.type === 'area') {
                    svg.push(this.renderLineChart());
                } else if (this.type === 'pie' || this.type === 'doughnut') {
                    svg.push(this.renderPieChart());
                }

                svg.push('</svg>');
                return svg.join('');
            },

            renderGridAndLabels() {
                const svg = [];
                const steps = 5;
                const maxVal = this.niceMax;

                for (let i = 0; i <= steps; i++) {
                    const value = (maxVal / steps) * i;
                    const y = this.padding.top + this.chartHeight - (this.chartHeight * (value /
                        maxVal));

                    if (this.showGrid) {
                        svg.push(
                            `<line class="chart-grid-line" x1="${this.padding.left}" y1="${y}" x2="${this.width - this.padding.right}" y2="${y}"/>`
                        );
                    }

                    if (this.showLabels) {
                        svg.push(
                            `<text class="chart-axis-label" x="${this.padding.left - 8}" y="${y + 4}" text-anchor="end">${this.formatValue(value)}</text>`
                        );
                    }
                }

                return svg.join('');
            },

            renderXLabels(centered = true) {
                if (!this.showLabels) return '';

                const svg = [];
                const y = this.chartHeight + this.padding.top + 16;

                this.labels.forEach((label, i) => {
                    let x;
                    if (centered) {
                        const groupWidth = this.chartWidth / this.labels.length;
                        x = this.padding.left + i * groupWidth + groupWidth / 2;
                    } else {
                        x = this.padding.left + (i / (this.labels.length - 1 || 1)) * this
                            .chartWidth;
                    }
                    svg.push(
                        `<text class="chart-axis-label" x="${x}" y="${y}" text-anchor="middle">${label}</text>`
                    );
                });

                return svg.join('');
            },

            renderBarChart() {
                const svg = [];
                svg.push(this.renderGridAndLabels());

                const numGroups = this.labels.length;
                const numDatasets = this.data.length;
                if (numGroups === 0) return svg.join('');

                const groupWidth = this.chartWidth / numGroups;
                const barPadding = groupWidth * 0.1;
                const barGroupWidth = groupWidth - barPadding * 2;
                const barWidth = barGroupWidth / numDatasets;

                this.data.forEach((dataset, di) => {
                    const color = this.getColor(di);
                    const datasetLabel = dataset.label || null;
                    (dataset.data || []).forEach((value, vi) => {
                        const x = this.padding.left + vi * groupWidth + barPadding +
                            di * barWidth;
                        const barHeight = (value / this.niceMax) * this.chartHeight;
                        const y = this.padding.top + this.chartHeight - barHeight;
                        const label = this.labels[vi] || `Item ${vi + 1}`;

                        const tooltipData = JSON.stringify({
                            label,
                            value,
                            color,
                            datasetLabel
                        }).replace(/"/g, '&quot;');
                        svg.push(
                            `<rect class="chart-bar" x="${x}" y="${y}" width="${barWidth - 2}" height="${barHeight}" fill="${color}" rx="2" onmousemove="this.getRootNode().host ? null : Alpine.$data(this.closest('.ui-chart')).showTooltip(event, '${label}', ${value}, '${color}', ${datasetLabel ? `'${datasetLabel}'` : 'null'})" onmouseleave="this.getRootNode().host ? null : Alpine.$data(this.closest('.ui-chart')).hideTooltip()" style="cursor: pointer"/>`
                        );

                        if (this.showValues && barHeight > 0) {
                            svg.push(
                                `<text class="chart-value-label" x="${x + (barWidth - 2) / 2}" y="${y - 4}" text-anchor="middle">${this.formatValue(value)}</text>`
                            );
                        }
                    });
                });

                svg.push(this.renderXLabels(true));
                return svg.join('');
            },

            renderLineChart() {
                const svg = [];
                svg.push(this.renderGridAndLabels());

                this.data.forEach((dataset, di) => {
                    const color = this.getColor(di);
                    const datasetLabel = dataset.label || null;
                    const values = dataset.data || [];
                    const points = [];

                    values.forEach((value, vi) => {
                        const x = this.padding.left + (vi / (values.length - 1 ||
                            1)) * this.chartWidth;
                        const y = this.padding.top + this.chartHeight - (value /
                            this.niceMax) * this.chartHeight;
                        const label = this.labels[vi] || `Item ${vi + 1}`;
                        points.push({
                            x,
                            y,
                            value,
                            label
                        });
                    });

                    if (points.length === 0) return;

                    // Build path
                    const pathD = points.map((p, i) =>
                        `${i === 0 ? 'M' : 'L'} ${p.x} ${p.y}`).join(' ');

                    // Area fill
                    if (this.type === 'area') {
                        const baseline = this.padding.top + this.chartHeight;
                        const areaD = pathD +
                            ` L ${points[points.length - 1].x} ${baseline} L ${points[0].x} ${baseline} Z`;
                        svg.push(`<path class="chart-area" d="${areaD}" fill="${color}"/>`);
                    }

                    // Line
                    svg.push(`<path class="chart-line" d="${pathD}" stroke="${color}"/>`);

                    // Points with tooltips
                    points.forEach(p => {
                        svg.push(
                            `<circle class="chart-point" cx="${p.x}" cy="${p.y}" r="4" fill="${color}" onmousemove="Alpine.$data(this.closest('.ui-chart')).showTooltip(event, '${p.label}', ${p.value}, '${color}', ${datasetLabel ? `'${datasetLabel}'` : 'null'})" onmouseleave="Alpine.$data(this.closest('.ui-chart')).hideTooltip()" style="cursor: pointer"/>`
                        );
                    });
                });

                svg.push(this.renderXLabels(false));
                return svg.join('');
            },

            renderPieChart() {
                const svg = [];
                const values = this.data[0]?.data || [];
                const total = values.reduce((sum, v) => sum + v, 0) || 1;

                const centerX = this.width / 2;
                const centerY = this.height / 2;
                const radius = Math.min(this.width, this.height) / 2 - 10;
                const innerRadius = this.type === 'doughnut' ? radius * 0.6 : 0;

                let startAngle = -Math.PI / 2;

                values.forEach((value, i) => {
                    const color = this.getColor(i);
                    const label = this.labels[i] || `Segment ${i + 1}`;
                    const percentage = ((value / total) * 100).toFixed(1);
                    const angle = (value / total) * Math.PI * 2;
                    const endAngle = startAngle + angle;

                    const path = this.describeArc(centerX, centerY, radius, innerRadius,
                        startAngle, endAngle);
                    svg.push(
                        `<path class="chart-slice" d="${path}" fill="${color}" onmousemove="Alpine.$data(this.closest('.ui-chart')).showPieTooltip(event, '${label}', ${value}, '${color}', ${percentage})" onmouseleave="Alpine.$data(this.closest('.ui-chart')).hideTooltip()" style="cursor: pointer"/>`
                    );

                    startAngle = endAngle;
                });

                return svg.join('');
            },

            describeArc(x, y, outerRadius, innerRadius, startAngle, endAngle) {
                const largeArc = endAngle - startAngle > Math.PI ? 1 : 0;

                const x1 = x + outerRadius * Math.cos(startAngle);
                const y1 = y + outerRadius * Math.sin(startAngle);
                const x2 = x + outerRadius * Math.cos(endAngle);
                const y2 = y + outerRadius * Math.sin(endAngle);

                if (innerRadius === 0) {
                    return `M ${x} ${y} L ${x1} ${y1} A ${outerRadius} ${outerRadius} 0 ${largeArc} 1 ${x2} ${y2} Z`;
                }

                const x3 = x + innerRadius * Math.cos(endAngle);
                const y3 = y + innerRadius * Math.sin(endAngle);
                const x4 = x + innerRadius * Math.cos(startAngle);
                const y4 = y + innerRadius * Math.sin(startAngle);

                return `M ${x1} ${y1} A ${outerRadius} ${outerRadius} 0 ${largeArc} 1 ${x2} ${y2} L ${x3} ${y3} A ${innerRadius} ${innerRadius} 0 ${largeArc} 0 ${x4} ${y4} Z`;
            },

            // Tooltip methods
            showTooltip(event, label, value, color, datasetLabel = null) {
                const rect = this.$el.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                let content = '';
                if (datasetLabel) {
                    content =
                        `<span class="chart-tooltip-color" style="background: ${color}"></span>`;
                    content += `<span class="chart-tooltip-label">${datasetLabel}</span><br>`;
                }
                content += `<span class="chart-tooltip-label">${label}</span><br>`;
                content += `<span class="chart-tooltip-value">${this.formatValue(value)}</span>`;

                this.tooltip = {
                    show: true,
                    x,
                    y,
                    content
                };
            },

            showPieTooltip(event, label, value, color, percentage) {
                const rect = this.$el.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                let content =
                    `<span class="chart-tooltip-color" style="background: ${color}"></span>`;
                content += `<span class="chart-tooltip-label">${label}</span><br>`;
                content += `<span class="chart-tooltip-value">${this.formatValue(value)}</span>`;
                content += `<span style="opacity: 0.7; margin-left: 4px">(${percentage}%)</span>`;

                this.tooltip = {
                    show: true,
                    x,
                    y,
                    content
                };
            },

            hideTooltip() {
                this.tooltip.show = false;
            },

            // Public API
            updateChart(newData, newLabels = null) {
                this.data = newData;
                if (newLabels !== null) {
                    this.labels = newLabels;
                }
            },
        }));
    });
</script>
