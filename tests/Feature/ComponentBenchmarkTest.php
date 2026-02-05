<?php

use Illuminate\Support\Facades\Blade;

// Helper function to benchmark component rendering
function benchmarkComponent(string $blade, int $iterations = 100): array
{
    // Warmup - compile the view
    Blade::render($blade);

    $times = [];
    for ($i = 0; $i < $iterations; $i++) {
        $start = hrtime(true);
        Blade::render($blade);
        $times[] = (hrtime(true) - $start) / 1_000_000; // Convert to ms
    }

    return [
        'min' => min($times),
        'max' => max($times),
        'avg' => array_sum($times) / count($times),
        'total' => array_sum($times),
        'iterations' => $iterations,
    ];
}

function formatBenchmark(string $name, array $result): string
{
    return sprintf(
        '%-30s avg: %6.3fms | total: %7.2fms | min: %6.3fms | max: %6.3fms',
        $name,
        $result['avg'],
        $result['total'],
        $result['min'],
        $result['max']
    );
}

test('benchmark simple components', function () {
    $iterations = 100;

    // Only test standalone components without external dependencies
    $components = [
        'text' => '<ui:text>Content</ui:text>',
        'text (sized)' => '<ui:text size="lg">Content</ui:text>',
        'text (variant)' => '<ui:text variant="muted" weight="medium">Content</ui:text>',
        'heading' => '<ui:heading>Title</ui:heading>',
        'heading (level)' => '<ui:heading level="1">Title</ui:heading>',
        'divider' => '<ui:divider />',
        'divider (text)' => '<ui:divider text="OR" />',
        'divider (vertical)' => '<ui:divider orientation="vertical" />',
    ];

    $results = [];
    foreach ($components as $name => $blade) {
        $results[$name] = benchmarkComponent($blade, $iterations);
    }

    // Output results
    dump("\n=== Component Benchmark Results ({$iterations} iterations) ===\n");
    foreach ($results as $name => $result) {
        dump(formatBenchmark($name, $result));
    }

    // Summary
    $avgTimes = array_column($results, 'avg');
    dump("\n=== Summary ===");
    dump(sprintf('Fastest: %.3fms | Slowest: %.3fms | Range: %.3fms',
        min($avgTimes),
        max($avgTimes),
        max($avgTimes) - min($avgTimes)
    ));

    expect(true)->toBeTrue(); // Always pass, this is for measurement
});

test('benchmark nested components', function () {
    $iterations = 50;

    $components = [
        'single text' => '<ui:text>Content</ui:text>',
        '5 text' => str_repeat('<ui:text>Content</ui:text>', 5),
        '10 text' => str_repeat('<ui:text>Content</ui:text>', 10),
        '20 text' => str_repeat('<ui:text>Content</ui:text>', 20),
        '50 text' => str_repeat('<ui:text>Content</ui:text>', 50),
        'mixed (10)' => str_repeat('<ui:text>A</ui:text><ui:heading>B</ui:heading>', 5),
    ];

    $results = [];
    foreach ($components as $name => $blade) {
        $results[$name] = benchmarkComponent($blade, $iterations);
    }

    dump("\n=== Nested Component Benchmark ({$iterations} iterations) ===\n");
    foreach ($results as $name => $result) {
        dump(formatBenchmark($name, $result));
    }

    // Calculate scaling factor
    if (isset($results['single text'], $results['10 text'])) {
        $scaling = $results['10 text']['avg'] / $results['single text']['avg'];
        dump(sprintf("\nText scaling factor (10x): %.2fx (ideal: 10x)", $scaling));
    }

    expect(true)->toBeTrue();
});

test('benchmark scaling simulation', function () {
    $iterations = 20;

    // Simulate repeated components at different scales
    $components = [
        '10 components' => str_repeat('<ui:text>A</ui:text><ui:divider />', 5),
        '25 components' => str_repeat('<ui:text>A</ui:text><ui:divider /><ui:heading>B</ui:heading>', 8).'<ui:text>End</ui:text>',
        '50 components' => str_repeat('<ui:text>A</ui:text><ui:divider />', 25),
        '100 components' => str_repeat('<ui:text>A</ui:text><ui:divider />', 50),
    ];

    $results = [];
    foreach ($components as $name => $blade) {
        $results[$name] = benchmarkComponent($blade, $iterations);
    }

    dump("\n=== Scaling Simulation ({$iterations} iterations) ===\n");
    foreach ($results as $name => $result) {
        dump(formatBenchmark($name, $result));
    }

    // Calculate scaling efficiency
    $base = $results['10 components']['avg'];
    dump("\n=== Scaling Analysis ===");
    foreach ($results as $name => $result) {
        $factor = $result['avg'] / $base;
        dump(sprintf('%-20s %.2fx vs baseline', $name, $factor));
    }

    expect(true)->toBeTrue();
});

test('benchmark icon component', function () {
    $iterations = 100;

    $components = [
        'icon (simple)' => '<ui:icon name="check" />',
        'icon (sized)' => '<ui:icon name="check" size="lg" />',
        'icon (colored)' => '<ui:icon name="check" color="primary" />',
        'icon (boxed)' => '<ui:icon name="check" boxed />',
        'icon (full)' => '<ui:icon name="check" size="lg" color="success" boxed round />',
    ];

    $results = [];
    foreach ($components as $name => $blade) {
        $results[$name] = benchmarkComponent($blade, $iterations);
    }

    dump("\n=== Icon Component Benchmark ({$iterations} iterations) ===\n");
    foreach ($results as $name => $result) {
        dump(formatBenchmark($name, $result));
    }

    // Compare with raw svg() helper
    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        svg('lucide-check', 'size-4')->toHtml();
    }
    $rawSvgTime = (hrtime(true) - $start) / 1_000_000;

    dump(sprintf("\nRaw svg() helper:              avg: %6.3fms", $rawSvgTime / $iterations));
    dump(sprintf('Overhead vs raw svg():         %.2fx', $results['icon (simple)']['avg'] / ($rawSvgTime / $iterations)));

    expect(true)->toBeTrue();
});

test('benchmark icon scaling', function () {
    $iterations = 20;

    $components = [
        '1 icon' => '<ui:icon name="check" />',
        '5 icons' => str_repeat('<ui:icon name="check" />', 5),
        '10 icons' => str_repeat('<ui:icon name="check" />', 10),
        '20 icons' => str_repeat('<ui:icon name="check" />', 20),
        '50 icons' => str_repeat('<ui:icon name="check" />', 50),
    ];

    $results = [];
    foreach ($components as $name => $blade) {
        $results[$name] = benchmarkComponent($blade, $iterations);
    }

    dump("\n=== Icon Scaling Benchmark ({$iterations} iterations) ===\n");
    foreach ($results as $name => $result) {
        dump(formatBenchmark($name, $result));
    }

    // Calculate per-icon cost
    $baseOverhead = $results['1 icon']['avg'];
    $perIconCost = ($results['50 icons']['avg'] - $baseOverhead) / 49;
    dump(sprintf("\nPer-icon marginal cost: %.3fms", $perIconCost));
    dump(sprintf('Base overhead: %.3fms', $baseOverhead));

    expect(true)->toBeTrue();
});

test('benchmark ClassBuilder performance', function () {
    $iterations = 1000;

    // Test ClassBuilder without user classes (fast path)
    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        $classes = \Ui::classes()
            ->add('flex items-center gap-2')
            ->add('primary', ['primary' => 'bg-blue-500', 'secondary' => 'bg-gray-500'])
            ->when(true, 'font-bold')
            ->__toString();
    }
    $withoutMerge = (hrtime(true) - $start) / 1_000_000;

    // Test ClassBuilder with user classes (merge path)
    $bag = new \Illuminate\View\ComponentAttributeBag(['class' => 'custom-class mt-4']);
    $start = hrtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        $classes = \Ui::classes()
            ->add('flex items-center gap-2')
            ->add('primary', ['primary' => 'bg-blue-500', 'secondary' => 'bg-gray-500'])
            ->when(true, 'font-bold')
            ->merge($bag)
            ->__toString();
    }
    $withMerge = (hrtime(true) - $start) / 1_000_000;

    dump("\n=== ClassBuilder Performance ({$iterations} iterations) ===\n");
    dump(sprintf('Without merge: %.2fms (%.4fms per call)', $withoutMerge, $withoutMerge / $iterations));
    dump(sprintf('With merge:    %.2fms (%.4fms per call)', $withMerge, $withMerge / $iterations));
    dump(sprintf('Overhead:      %.2fx', $withMerge / $withoutMerge));

    expect(true)->toBeTrue();
});
