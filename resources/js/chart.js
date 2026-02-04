import Chart from "chart.js/auto";

const chartInstances = new Map();

function getThemeColors() {
    const style = getComputedStyle(document.documentElement);

    // Use Tailwind CSS color variables with fallbacks to Tailwind defaults
    return [
        style.getPropertyValue("--color-blue-500").trim() || "#3b82f6",
        style.getPropertyValue("--color-emerald-500").trim() || "#10b981",
        style.getPropertyValue("--color-amber-500").trim() || "#f59e0b",
        style.getPropertyValue("--color-rose-500").trim() || "#f43f5e",
        style.getPropertyValue("--color-violet-500").trim() || "#8b5cf6",
        style.getPropertyValue("--color-cyan-500").trim() || "#06b6d4",
    ];
}

function getBackgroundColor(type, colors, index) {
    const color = colors[index % colors.length];

    if (type === "pie" || type === "doughnut") {
        return colors;
    }

    if (type === "bar") {
        return color;
    }

    // Line/Area: transparent fill - convert hex to rgba
    if (color.startsWith("#")) {
        const r = parseInt(color.slice(1, 3), 16);
        const g = parseInt(color.slice(3, 5), 16);
        const b = parseInt(color.slice(5, 7), 16);
        return `rgba(${r}, ${g}, ${b}, 0.1)`;
    }

    return color;
}

function prepareDataset(dataset, type, colors, index) {
    return {
        ...dataset,
        backgroundColor: dataset.backgroundColor ?? getBackgroundColor(type, colors, index),
        borderColor: dataset.borderColor ?? colors[index % colors.length],
        borderWidth: dataset.borderWidth ?? 2,
        tension: dataset.tension ?? 0.3,
        fill: dataset.fill ?? type === "area",
        pointRadius: dataset.pointRadius ?? (type === "line" || type === "area" ? 3 : 0),
        pointHoverRadius: dataset.pointHoverRadius ?? 5,
    };
}

function initChart(element) {
    // Skip if already initialized
    if (chartInstances.has(element)) return;

    const canvas = element.querySelector("canvas");
    if (!canvas) return;

    const type = element.dataset.chartType || "line";
    const chartType = type === "area" ? "line" : type;

    let labels = [];
    let datasets = [];
    let options = {};

    try {
        labels = JSON.parse(element.dataset.chartLabels || "[]");
        datasets = JSON.parse(element.dataset.chartData || "[]");
        options = JSON.parse(element.dataset.chartOptions || "{}");
    } catch (e) {
        console.error("Chart: Invalid JSON in data attributes", e);
        return;
    }

    const colors = getThemeColors();

    const chart = new Chart(canvas.getContext("2d"), {
        type: chartType,
        data: {
            labels,
            datasets: datasets.map((dataset, index) => prepareDataset(dataset, type, colors, index)),
        },
        options: {
            responsive: true,
            maintainAspectRatio: !element.dataset.chartHeight,
            plugins: {
                legend: {
                    display: datasets.length > 1,
                    position: "bottom",
                    labels: {
                        usePointStyle: true,
                        padding: 16,
                    },
                },
            },
            ...options,
        },
    });

    chartInstances.set(element, chart);

    // Store update function on element for external access
    element.chartInstance = chart;
    element.updateChart = (newData, newLabels = null) => {
        if (newLabels !== null) {
            chart.data.labels = newLabels;
        }
        chart.data.datasets = newData.map((dataset, index) => ({
            ...chart.data.datasets[index],
            ...prepareDataset(dataset, type, colors, index),
        }));
        chart.update("none");
    };
}

function destroyChart(element) {
    const chart = chartInstances.get(element);
    if (chart) {
        chart.destroy();
        chartInstances.delete(element);
    }
}

function initAllCharts(root = document) {
    root.querySelectorAll("[data-chart]").forEach(initChart);
}

// Initialize on page load
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => initAllCharts());
} else {
    initAllCharts();
}

// Reinitialize after Livewire navigation (wire:navigate)
document.addEventListener("livewire:navigated", () => {
    initAllCharts();
});

// Livewire support for morphing
if (typeof Livewire !== "undefined") {
    Livewire.hook("morph.added", ({ el }) => {
        if (el.matches?.("[data-chart]")) {
            initChart(el);
        }
        el.querySelectorAll?.("[data-chart]").forEach(initChart);
    });

    // Handle Livewire updates
    Livewire.hook("morph.updating", ({ el, component }) => {
        if (el.matches?.("[data-chart]")) {
            // Chart will be re-initialized after morph
        }
    });

    Livewire.hook("morph.removed", ({ el }) => {
        if (el.matches?.("[data-chart]")) {
            destroyChart(el);
        }
    });
}

// Listen for custom update events
document.addEventListener("chart:update", (event) => {
    const { name, data, labels } = event.detail;
    const element = document.querySelector(`[data-chart][data-chart-name="${name}"]`);
    if (element?.updateChart) {
        element.updateChart(data, labels);
    }
});

// Watch for dark mode changes and update all charts
const observer = new MutationObserver(() => {
    const colors = getThemeColors();

    chartInstances.forEach((chart, element) => {
        const type = element.dataset.chartType || "line";
        chart.data.datasets = chart.data.datasets.map((dataset, index) => ({
            ...dataset,
            backgroundColor: getBackgroundColor(type, colors, index),
            borderColor: colors[index % colors.length],
        }));
        chart.update("none");
    });
});

observer.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ["class"],
});

export { initChart, initAllCharts, destroyChart };
