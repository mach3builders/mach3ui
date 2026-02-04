import Chart from "chart.js/auto";

const chartInstances = new Map();

function getThemeColors() {
    const style = getComputedStyle(document.documentElement);
    return [
        style.getPropertyValue("--color-primary").trim() || "oklch(0.55 0.22 265)",
        style.getPropertyValue("--color-success").trim() || "oklch(0.55 0.18 145)",
        style.getPropertyValue("--color-warning").trim() || "oklch(0.75 0.18 85)",
        style.getPropertyValue("--color-danger").trim() || "oklch(0.55 0.22 25)",
        "oklch(0.6 0.15 200)",
        "oklch(0.65 0.2 330)",
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

    // Line/Area: transparent fill
    return color.replace(")", " / 0.1)").replace("oklch(", "oklch(");
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
initAllCharts();

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
